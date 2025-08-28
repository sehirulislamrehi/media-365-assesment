<?php

namespace App\Models\UserModule;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{

    protected $fillable = [
        'name',
        'key',
        'icon',
        'position',
        'route',
        'left_menu_visibility',
        'created_at',
        'update_at',
    ];

    public function subModule(): HasMany
    {
        return $this->hasMany(SubModule::class);
    }

    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class);
    }
}
