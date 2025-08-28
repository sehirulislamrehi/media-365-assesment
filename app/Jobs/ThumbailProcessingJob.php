<?php

namespace App\Jobs;

use App\Enum\Modules\UserModule\ThumbnailStatusEnum;
use App\Models\UserModule\Thumbnail;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ThumbailProcessingJob implements ShouldQueue
{
    use Queueable;

    protected $thumbnail;

    /**
     * Create a new job instance.
     */
    public function __construct(Thumbnail $thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(rand(1, 2));
        $isSuccess = rand(1, 100) > 20; 
        $this->thumbnail->status = $isSuccess ? ThumbnailStatusEnum::PROCESSED->value : ThumbnailStatusEnum::FAILED->value;
        $this->thumbnail->processed_at = Carbon::now();
        $this->thumbnail->save();

        $message = "{$this->thumbnail->image_url} is processed";
        $userId = $this->thumbnail->user_id;
        $table = "file-processing-table";
        broadcast(new \App\Events\FileProcessingEvent($message, $userId, $table));

    }
}
