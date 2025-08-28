<?php

namespace App\Models\UserModule;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubModule extends Model
{
    
    protected $fillable = [
        'name',
        'key',
        'position',
        'route',
        'module_id',
        'created_at',
        'updated_at',
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
