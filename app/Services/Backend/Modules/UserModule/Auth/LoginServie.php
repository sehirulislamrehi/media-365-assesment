<?php
declare(strict_types=1);

namespace App\Services\Backend\Modules\UserModule\Auth;

use App\Http\Requests\Backend\UserModule\Auth\LoginRequest;
use App\Interfaces\Modules\UserModule\User\ReadUserInterface;
use App\Models\UserModule\User;

class LoginServie
{

     public function __construct(
          protected ReadUserInterface $readUserRepository
     ) {}

     /**
      * Get user by email.
      *
      * @param string $email
      * @return User|null
      */
     public function getUserByEmail(string $email): ?User
     {
          return $this->readUserRepository->getUserByEmail($email);
     }

     /**
      * Attempt to log in the user.
      *
      * @param LoginRequest $request
      * @return bool
      */
     public function doLogin(LoginRequest $request): bool
     {
          return auth('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true);
     }
}
