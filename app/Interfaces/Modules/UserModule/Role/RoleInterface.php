<?php

declare(strict_types=1);

namespace App\Interfaces\Modules\UserModule\Role;

use App\Models\UserModule\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface RoleInterface
{
     
     public function getAllRoleForAdminDataTable(): Builder;
     public function create(array $data): Role;
     public function update(Role $role, array $data): Role;
     public function getRoleById(int $id): Role;
     public function getAllRoles(string $status): Collection;

}