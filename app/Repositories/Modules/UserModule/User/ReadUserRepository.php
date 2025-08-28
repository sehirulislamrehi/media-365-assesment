<?php

declare(strict_types=1);

namespace App\Repositories\Modules\UserModule\User;

use App\Interfaces\Modules\UserModule\User\ReadUserInterface;
use App\Models\UserModule\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ReadUserRepository implements ReadUserInterface{

     /**
      * Get user by email.
      *
      * @param string $email
      * @return User|null
      */
     public function getUserByEmail(string $email): ?User
     {
          return User::where('email', $email)->first();
     }

     /**
      * Get user by ID.
      *
      * @param int $id
      * @return User
      */
     public function getAllUserForAdminDataTable(Request $request, ?object $auth = null): Builder
     {
          
          $query = User::query();
          $query->where("is_super_admin", false);

          if($auth){
               $query->where('id', '!=', $auth->id);
          }

          return $query->orderBy("id","desc");
     }


     /**
      * Get user by ID.
      *
      * @param int $id
      * @return User
      */
     public function getUserById(int $id): User
     {
          return User::where("id",$id)->first();
     }

     
}