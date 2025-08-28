<?php

namespace App\Models\UserModule;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thumbnail extends Model
{
    
    protected $fillable = [
        "user_id",
        "image_url",
        "status",
        "processed_at",
        "created_at",
        "updated_at",
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'processed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
}
