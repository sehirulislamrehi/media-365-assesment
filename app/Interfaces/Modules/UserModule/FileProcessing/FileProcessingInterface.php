<?php
namespace App\Interfaces\Modules\UserModule\FileProcessing;

use Illuminate\Http\Request;

interface FileProcessingInterface{
    public function create(array $data): object;
    public function getAllDataQueryForAdminDataTable(Request $request,object $auth): object;
}