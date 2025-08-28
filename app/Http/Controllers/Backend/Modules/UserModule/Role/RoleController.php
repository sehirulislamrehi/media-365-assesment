<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Modules\UserModule\Role;

use App\Http\Controllers\Controller;
use App\Services\Backend\Datatables\Modules\UserModule\Role\RoleDatatableService;
use App\Services\Backend\Modules\UserModule\Module\ModuleService;
use App\Services\Backend\Modules\UserModule\Role\RoleService;
use App\Traits\Modules\ApiResponseTrait;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{

    use ApiResponseTrait;

    public function __construct(
        protected RoleService $roleService,
        protected RoleDatatableService $roleDatatableService,
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
            if (can("manage_role")) {
                return view('backend.modules.user_module.role.index');
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
     * @return JsonResponse
     */
    public function data(): JsonResponse
    {
        try {
            if (can("manage_role")) {
                $data = $this->roleService->getAllRoleForAdminDataTable();
                return $this->roleDatatableService->makeTable($data);
            } else {
                return $this->response(
                    status: 'error',
                    data: [],
                    message: 'You do not have permission to manage roles.',
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
     * Create a new role modal.
     *
     * @return JsonResponse
     */
    public function createModal(): View
    {
        try {
            if (can("manage_role")) {
                $modules = $this->moduleService->getAllModule();
                return view('backend.modules.user_module.role.modals.create', [
                    'modules' => $modules
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
     * Store a newly created role in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        try {
            if (can('manage_role')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                ]);
                if ($validator->fails()) {
                    return $this->response(
                        status: 'warning',
                        data: [],
                        message: $validator->errors()->first(),
                        code: 200
                    );
                }

                if ($request['permissions']) {
                    $this->roleService->create($request);

                    return $this->response(
                        status: 'success',
                        data: [],
                        message: 'Role created successfully.',
                        tableName: '#dataGrid'
                    );
                } else {
                    return $this->response(
                        status: 'warning',
                        data: [],
                        message: 'Permissions is missing.'
                    );
                }
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

    /**
     * Show the form for updating the specified role.
     *
     * @param int $id
     * @return View
     */
    public function updateModal(int $id): View
    {
        try {
            if (can("manage_role")) {
                $role = $this->roleService->getRoleById($id);
                if (!$role) {
                    return view('errors.modals.404', [
                        'message' => 'Role not found.'
                    ]);
                }
                $modules = $this->moduleService->getAllModule();
                return view('backend.modules.user_module.role.modals.update', [
                    'modules' => $modules,
                    'role' => $role
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
     * Update the specified role in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            if (can('manage_role')) {

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'is_active' => 'required',
                ]);
                if ($validator->fails()) {
                    return $this->response(
                        status: 'warning',
                        data: [],
                        message: $validator->errors()->first(),
                        code: 200
                    );
                }

                if ($request['permissions']) {
                    $role = $this->roleService->getRoleById($id);
                    if (!$role) {
                        return $this->response(
                            status: 'warning',
                            data: [],
                            message: "Role not found.",
                            code: 200
                        );
                    }

                    $this->roleService->update($role, $request);

                    return $this->response(
                        status: 'success',
                        data: [],
                        message: 'Role updated successfully.',
                        tableName: '#dataGrid'
                    );
                } else {
                    return $this->response(
                        status: 'warning',
                        data: [],
                        message: 'Permissions is missing.'
                    );
                }
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
