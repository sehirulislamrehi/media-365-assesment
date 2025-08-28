<?php

declare(strict_types=1);

namespace App\Services\Backend\Modules\UserModule\User;

use App\DTO\Modules\UserModule\User\CreateUserDTO;
use App\DTO\Modules\UserModule\User\UpdateUserDTO;
use App\Enum\Modules\UserModule\UserTiersEnum;
use App\Http\Requests\Backend\UserModule\User\CreateUserRequest;
use App\Http\Requests\Backend\UserModule\User\UpdateUserRequest;
use App\Interfaces\Modules\UserModule\User\ReadUserInterface;
use App\Interfaces\Modules\UserModule\User\WriteUserInterface;
use App\Models\UserModule\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{

     public function __construct(
          protected ReadUserInterface $readUserRepository,
          protected WriteUserInterface $writeUserRepository
     ) {
          // You can add any initialization code here if needed
     }

     /**
      * Get user by email.
      *
      * @param string $email
      * @return User|null
      */
     public function getAllUserForAdminDataTable(Request $request, ?object $auth = null): Builder
     {
          return $this->readUserRepository->getAllUserForAdminDataTable($request, $auth);
     }

     /**
      * Create a new user.
      *
      * @param CreateUserRequest $request
      * @return mixed
      */
     public function createUser(CreateUserRequest $request): User
     {
          $createUserDTO = CreateUserDTO::fromRequest($request);
          return $this->writeUserRepository->createUser($createUserDTO->toArray());
     }

     /**
      * Update an existing user.
      *
      * @param int $id
      * @param CreateUserRequest $request
      * @return mixed
      */
     public function getUserById(int $id): User
     {
          return $this->readUserRepository->getUserById($id);
     }


     public function updateUser(User $user, UpdateUserRequest $request): User
     {
          $updateUserDTO = UpdateUserDTO::fromRequest($request);
          return $this->writeUserRepository->updateUser($user, $updateUserDTO->toArray());
     }

     public function resetPassword(User $user, Request $request): bool
     {
          $data = [
               'password' => Hash::make($request->password)
          ];
          return $this->writeUserRepository->resetPassword($user, $data);
     }


     public function updatePermission(object $user, Request $request): array
     {
          $data = [
               'permissions' => $request->input('permissions', [])
          ];

          return $this->writeUserRepository->updatePermission($user, $data);
     }

     public function userTiers(): array
     {
          return array_map(
               fn($enum) => [
                    'value' => $enum->value,
                    'label' => $enum->label(),
               ],
               UserTiersEnum::cases()
          );
     }
}
