<?php

namespace App\Services\Backend\Datatables\Modules\UserModule\FileProcessing;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FileProcessingDatatableService
{

    public function makeTable(object $data, Request $request): JsonResponse
    {
        return DataTables::of($data)
            ->order(function ($query) use ($request) {
                $query->orderBy('id', 'desc');
            })
            ->rawColumns(['user','created', 'processed'])
            ->addIndexColumn()
            ->addColumn('user', function ($data) {
                return $data->user->name;
            })
            ->addColumn('created', function ($data) {
                return $data->created_at->format('d, F Y, H:i');
            })
            ->addColumn('processed', function ($data) {
                return $data->processed_at?->format('d, F Y, H:i') ?? 'N/A';
            })
            ->make(true);
    }
}
