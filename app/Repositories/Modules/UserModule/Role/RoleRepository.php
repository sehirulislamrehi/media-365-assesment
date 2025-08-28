<?php

declare(strict_types=1);

namespace App\Repositories\Modules\UserModule\Role;

use App\Interfaces\Modules\UserModule\Role\RoleInterface;
use App\Models\UserModule\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class RoleRepository implements RoleInterface
{

     public function getAllRoleForAdminDataTable(): Builder
     {
          $query = Role::query();
          return $query->orderBy("id","desc");
     }

     public function create(array $data): Role
     {
          return DB::transaction(function () use ($data) {
               $role = Role::create($data);
               if (!empty($data['permissions'])) {
                    $role->permissions()->sync($data['permissions']);
               }

               return $role;
          });
     }

     public function getRoleById(int $id): Role
     {
          return Role::where("id", $id)->with("permissions")->first();
     }

     public function update(Role $role, array $data): Role
     {
          return DB::transaction(function () use ($role, $data) {
               $role->update($data);
               if (!empty($data['permissions'])) {
                    $role->permissions()->sync($data['permissions']);
               }

               return $role;
          });
     }

     /**
      * Get all roles based on their status.
      *
      * @param string $status
      * @return Collection
      */
     public function getAllRoles(string $status): Collection
     {
          $query =  Role::select("id", "name");

          if ($status == "active") {
               $query->where('is_active', true);
          }
          if ($status == "inactive") {
               $query->where('is_active', false);
          }

          return $query->get();
     }
}
