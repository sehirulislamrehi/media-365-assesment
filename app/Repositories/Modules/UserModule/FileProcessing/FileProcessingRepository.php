<?php
namespace App\Repositories\Modules\UserModule\FileProcessing;

use App\Interfaces\Modules\UserModule\FileProcessing\FileProcessingInterface;
use App\Models\UserModule\Thumbnail;
use Illuminate\Http\Request;

class FileProcessingRepository implements FileProcessingInterface{
    
    public function create(array $data): object
    {
        return Thumbnail::create($data);
    }


    public function getAllDataQueryForAdminDataTable(Request $request,object $auth): object
    {
        $query = Thumbnail::query();

        $query->with([
            "user" => function($innerQuery){
                return $innerQuery->select("id","name");
            }
        ]);

        if(!$auth->is_super_admin){
            $query->where("user_id", $auth->id);
        }

        return $query;
    }
}