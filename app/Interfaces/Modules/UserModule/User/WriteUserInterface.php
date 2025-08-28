<?php

declare(strict_types=1);

namespace App\Interfaces\Modules\UserModule\User;

use App\Models\UserModule\User;
use Illuminate\Database\Eloquent\Collection;

interface WriteUserInterface{
     public function createUser(array $data): User;
     public function updateUser(User $user, array $data): User;
     public function resetPassword(User $user, array $data): bool;
     public function updatePermission(User $user, array $data): array;
}