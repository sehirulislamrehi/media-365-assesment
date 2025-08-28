<?php

namespace App\Models\UserModule;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{

    protected $fillable = [
        'name',
        'is_active',
        'created_at',
        'updated_at',
    ];
    
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class,"role_permissions", "role_id", "permission_id");
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
