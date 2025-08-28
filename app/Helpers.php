<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

function can(string $permission): bool
{
    $user = auth('web')->user();

    if (!$user) {
        return false;
    }

    // Super admin bypass
    if ($user->is_super_admin) {
        return true;
    }

    if (!$user->role_id) {
        return false;
    }

    $cacheKeyForRolePermission = "role_{$user->role_id}_permissions";
    $rolePermissions = Cache::rememberForever($cacheKeyForRolePermission, function () use ($user) {
        return collect($user->role->permissions);
    });

    // Check role permissions first
    if (isset($rolePermissions)) {
        if ($rolePermissions->contains('key', $permission)) {
            return true;
        }
    }

    // Check direct user permissions
    $cacheKeyForUserPermission = "user_{$user->role_id}_permissions";
    $userPermissions = Cache::rememberForever($cacheKeyForUserPermission, function () use ($user) {
        return DB::table('user_permissions')
            ->join('permissions', 'permissions.id', '=', 'user_permissions.permission_id')
            ->where('user_permissions.user_id', $user->id)
            ->pluck('permissions.key')
            ->toArray();
    });

    return in_array($permission, $userPermissions, false);
}