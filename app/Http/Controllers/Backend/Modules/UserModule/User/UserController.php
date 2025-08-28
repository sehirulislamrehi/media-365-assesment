<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Modules\UserModule\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserModule\User\CreateUserRequest;
use App\Http\Requests\Backend\UserModule\User\UpdateUserRequest;
use App\Services\Backend\Datatables\Modules\UserModule\User\UserDatatableService;
use App\Services\Backend\Modules\UserModule\Module\ModuleService;
use App\Services\Backend\Modules\UserModule\Role\RoleService;
use App\Services\Backend\Modules\UserModule\User\UserService;
use App\Traits\Modules\ApiResponseTrait;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    use ApiResponseTrait;

    /**
     * UserController constructor.
     *
     * @param UserService $userService
     * @param UserDatatableService $userDatatableService
     */
    public function __construct(
        protected UserService $userService,
        protected UserDatatableService $userDatatableService,
        protected RoleService $roleService,
        protected ModuleService $moduleService
    ) {}

    /**
     * Display the user index view.
     *
     * @return View
     */
    public function index(): View
    {
        try {
            if (can('manage_user')) {
                $auth = auth('web')->user();
                $users = $this->userService->getAllUserForAdminDataTable(request(), $auth);
                return view('backend.modules.user_module.user.index', [
                    'users' => $users
                ]);
            } else {
                return view('errors.403');
            }
        } catch (Exception $e) {
            return view('errors.500', [
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Get user data for the admin data table.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function data(Request $request): JsonResponse
    {
        try {
            if (can('manage_user')) {
                $auth = auth('web')->user();
                $users = $this->userService->getAllUserForAdminDataTable($request, $auth);
                return $this->userDatatableService->makeTable($users, $auth);
            } else {
                return $this->response(
                    status: 'warning',
                    data: [],
                    message: 'You do not have permission to access this resource.',
                    code: 403
                );
            }
        } catch (Exception $e) {
            return $this->response(
                status: 'error',
                data: [],
                message: $e->getMessage(),
                code: 500
            );
        }
    }


    /**
     * Show the modal for creating a new user.
     *
     * @return View
     */
    public function createModal(): View
    {
        try {
            if (can('manage_user')) {
                $roles = $this->roleService->getAllRoles('active');
                $userTiers = $this->userService->userTiers();
                return view('backend.modules.user_module.user.modals.create', [
                    'roles' => $roles,
                    'userTiers' => $userTiers
                ]);
            } else {
                return view('errors.modals.403');
            }
        } catch (Exception $e) {
            return view('errors.500', [
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Handle the creation of a new user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(CreateUserRequest $request): JsonResponse
    {
        try {
            if (can('manage_user')) {
                $this->userService->createUser($request);
                return $this->response(
                    status: 'success',
                    data: [],
                    message: 'User created successfully.',
                    tableName: '#dataGrid',
                    code: 200
                );
            } else {
                return $this->response(
                    status: 'warning',
                    data: [],
                    message: 'You do not have permission to create a user.',
                    code: 403
                );
            }
        } catch (Exception $e) {
            return $this->response(
                status: 'error',
                data: [],
                message: $e->getMessage(),
                code: 500
            );
        }
    }

    /**
     * Show the modal for updating an existing user.
     *
     * @param int $id
     * @return View
     */
    public function updateModal(int $id): View
    {
        try {
            if (can('manage_user')) {
                $user = $this->userService->getUserById($id);
                if (!$user) {
                    return view('errors.modals.404');
                }
                $roles = $this->roleService->getAllRoles('active');
                $userTiers = $this->userService->userTiers();

                return view('backend.modules.user_module.user.modals.update', [
                    'user' => $user,
                    'roles' => $roles,
                    'userTiers' => $userTiers
                ]);
            } else {
                return view('errors.modals.403');
            }
        } catch (Exception $e) {
            return view('errors.modals.500', [
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Handle the update of an existing user.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function update(int $id, UpdateUserRequest $request): JsonResponse
    {
        try {
            if (can('manage_user')) {
                $user = $this->userService->getUserById($id);
                if (!$user) {
                    return $this->response(
                        status: 'warning',
                        data: [],
                        message: 'User not found.',
                        code: 404
                    );
                }
                $user = $this->userService->updateUser($user, $request);
                return $this->response(
                    status: 'success',
                    data: [],
                    message: 'User updated successfully.',
                    tableName: '#dataGrid',
                    code: 200
                );
            } else {
                return $this->response(
                    status: 'warning',
                    data: [],
                    message: 'You do not have permission to update this user.',
                    code: 403
                );
            }
        } catch (Exception $e) {
            return $this->response(
                status: 'error',
                data: [],
                message: $e->getMessage(),
                code: 500
            );
        }
    }


    public function resetPasswordModal(int $id): View
    {
        try {
            if (can('manage_user')) {
                $user = $this->userService->getUserById($id);
                if (!$user) {
                    return view('errors.modals.404');
                }
                return view('backend.modules.user_module.user.modals.reset_password', [
                    'user' => $user,
                ]);
            } else {
                return view('errors.modals.403');
            }
        } catch (Exception $e) {
            return view('errors.modals.500', [
                'message' => $e->getMessage()
            ]);
        }
    }


    public function resetPassword(int $id, Request $request): JsonResponse
    {
        try {
            if (can('reset_password')) {

                $validator = Validator::make($request->all(), [
                    "password" => "required|string|min:6|confirmed",
                ]);
                if ($validator->fails()) {
                    return $this->response(
                        status: 'warning',
                        data: [],
                        message: $validator->errors()->first(),
                        code: 200
                    );
                }

                $user = $this->userService->getUserById($id);
                if (!$user) {
                    return $this->response(
                        status: 'warning',
                        data: [],
                        message: 'User not found.',
                        code: 404
                    );
                }
                $user = $this->userService->resetPassword($user, $request);
                return $this->response(
                    status: 'success',
                    data: [],
                    message: 'User password reset successfully.',
                    tableName: '#dataGrid',
                    code: 200
                );
            } else {
                return $this->response(
                    status: 'warning',
                    data: [],
                    message: 'You do not have permission to reset password.',
                    code: 403
                );
            }
        } catch (Exception $e) {
            return $this->response(
                status: 'error',
                data: [],
                message: $e->getMessage(),
                code: 500
            );
        }
    }

    public function permissionModal(int $id): View
    {
        try {
            $auth = auth('web')->user();
            if ($auth->is_super_admin) {
                $user = $this->userService->getUserById($id);
                if (!$user) {
                    return view('errors.modals.404');
                }
                $modules = $this->moduleService->getAllModule();
                return view('backend.modules.user_module.user.modals.permission', [
                    'user' => $user,
                    'modules' => $modules
                ]);
            } else {
                return view('errors.modals.403');
            }
        } catch (Exception $e) {
            return view('errors.modals.500', [
                'message' => $e->getMessage()
            ]);
        }
    }


    public function permission(Request $request, int $id): JsonResponse
    {
        try {

            $auth = auth('web')->user();
            if ($auth->is_super_admin) {
                $user = $this->userService->getUserById($id);
                if (!$user) {
                    return $this->response(
                        status: 'warning',
                        data: [],
                        message: 'User not found.'
                    );
                }

                $this->userService->updatePermission($user, $request);

                return $this->response(
                    status: 'success',
                    data: [],
                    message: 'User permission updated successfully.',
                    tableName: '#dataGrid'
                );
            } else {
                return $this->response(
                    status: 'error',
                    data: [],
                    message: 'Unauthorized action.',
                    code: 403
                );
            }
        } catch (Exception $e) {
            return $this->response(
                status: 'error',
                data: [],
                message: $e->getMessage(),
                code: 500
            );
        }
    }
}
