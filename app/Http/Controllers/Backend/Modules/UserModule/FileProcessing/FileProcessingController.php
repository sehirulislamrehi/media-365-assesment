<?php

namespace App\Http\Controllers\Backend\Modules\UserModule\FileProcessing;

use App\Enum\Modules\UserModule\UserTiersEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserModule\FileProcessing\CreateFileProcessingRequest;
use App\Services\Backend\Datatables\Modules\UserModule\FileProcessing\FileProcessingDatatableService;
use App\Services\Backend\Modules\UserModule\FileProcessing\FileProcessingService;
use App\Services\Backend\Modules\UserModule\User\UserService;
use App\Traits\Modules\ApiResponseTrait;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FileProcessingController extends Controller
{

    use ApiResponseTrait;

    public function __construct(
        protected FileProcessingService $fileProcessingService,
        protected UserService $userService,
        protected FileProcessingDatatableService $fileProcessingDatatableService
    ) {}

    public function index(): View
    {
        try {
            if (can('file_processing')) {
                return view('backend.modules.user_module.file_processing.index');
            } else {
                return view('errors.403');
            }
        } catch (Exception $e) {
            return view('errors.500', [
                'message' => $e->getMessage()
            ]);
        }
    }


    public function createModal(): View
    {
        try {
            if (can('file_processing')) {
                $auth = auth('web')->user();
                $userTiers = UserTiersEnum::from($auth->user_tiers)->imageUpload();

                return view('backend.modules.user_module.file_processing.modals.create', [
                    'userTiers' => $userTiers,
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

    public function create(CreateFileProcessingRequest $request): JsonResponse
    {
        try {
            if (can('file_processing')) {
                $auth = auth('web')->user();
                $response = $this->fileProcessingService->handleFileProcessing($request, $auth);

                if ($response['status']) {
                    return $this->response(
                        status: 'success',
                        data: [],
                        message: $response['message'],
                        tableName: '#dataGrid',
                        code: 200
                    );
                }

                return $this->response(
                    status: 'warning',
                    data: [],
                    message: $response['message'],
                    tableName: '#dataGrid',
                    code: 200
                );
            } else {
                return $this->response(
                    status: 'warning',
                    data: [],
                    message: 'You are not authorized for this',
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


    public function data(Request $request): JsonResponse
    {
        try {
            if (can('file_processing')) {
                $auth = auth('web')->user();
                $data = $this->fileProcessingService->getAllDataQueryForAdminDataTable($request, $auth);
                return $this->fileProcessingDatatableService->makeTable($data, $request);
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
}
