<?php

namespace App\Services\Backend\Modules\UserModule\FileProcessing;

use App\Enum\Modules\UserModule\ThumbnailStatusEnum;
use App\Enum\Modules\UserModule\UserTiersEnum;
use App\Http\Requests\Backend\UserModule\FileProcessing\CreateFileProcessingRequest;
use App\Interfaces\Modules\UserModule\FileProcessing\FileProcessingInterface;
use App\Jobs\ThumbailProcessingJob;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileProcessingService
{

    public function __construct(
        protected FileProcessingInterface $fileProcessingRepository
    )
    {
        
    }

    public function handleFileProcessing(CreateFileProcessingRequest $request, object $auth)
    {
        $userTiers = UserTiersEnum::from($auth->user_tiers)->imageUpload();
        $links = array_map(fn($url) => trim($url), explode(',', $request->image_links));

        if(count($links) > $userTiers){
            return [
                'status' => false,
                'message' => "Your limit is {$userTiers}",
                'data' => []
            ];
        }

        try{
            DB::beginTransaction();
            $now = Carbon::now();
            foreach( $links as $link ){
                $data = [
                    "user_id" => $auth->id,
                    "image_url" => $link,
                    "status" => ThumbnailStatusEnum::PENDING->value,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
                $thumbnail = $this->fileProcessingRepository->create($data);
                dispatch(new ThumbailProcessingJob($thumbnail))
                    ->onQueue($this->getQueueForUser($auth));
            }

            DB::commit();
            return [
                'status' => true,
                'message' => 'Your request is processed',
                'data' => []
            ];
        }
        catch( Exception $e ){
            DB::rollBack();
            return [
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ];
        }
    }

    private function getQueueForUser($auth)
    {
        return match ($auth->user_tiers) {
            UserTiersEnum::FREE->value => 'free',
            UserTiersEnum::PRO->value => 'pro',
            UserTiersEnum::ENTERPRISE->value => 'enterprise',
            default      => 'free',
        };
    }

    public function getAllDataQueryForAdminDataTable(Request $request, object $auth): object
    {
        return $this->fileProcessingRepository->getAllDataQueryForAdminDataTable($request, $auth);
    }
}
