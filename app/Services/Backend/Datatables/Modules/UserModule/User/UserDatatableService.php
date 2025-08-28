<?php
declare(strict_types=1);

namespace App\Services\Backend\Datatables\Modules\UserModule\User;

use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class UserDatatableService
{

    /**
     * Generate a DataTable for user data.
     *
     * @param mixed $data
     * @return JsonResponse
     */
    public function makeTable(object $data, object $auth): JsonResponse
    {
        return DataTables::of($data)
            ->rawColumns(['action', 'is_active'])
            ->addIndexColumn()
            ->editColumn('is_active', function ($data) {
                if ($data->is_active) {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->addColumn('action', function ($data) use ($auth) {
                $html = '';

                if (can('manage_user')) {
                    $html .= '<button type="button" data-content="' . route('admin.user-module.user.update.modal', $data->id) . '" class="action-btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i class="fa fa-edit"></i>
                        </button>';
                }

                if(can("reset_password")){
                    $html .= '<button type="button" data-content="' . route('admin.user-module.user.reset.password.modal', $data->id) . '" class="action-btn btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i class="fa fa-key"></i>
                        </button>';
                }

                if ($auth->is_super_admin) {
                    $html .= '<button type="button" data-content="' . route('admin.user-module.user.permission.modal', $data->id) . '" class="action-btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#extraLargeModal">
                            <i class="fa fa-user-secret"></i>
                        </button>';
                }

                return $html;
            })
            ->make(true);
    }
}
