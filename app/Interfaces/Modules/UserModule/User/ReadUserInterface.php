<?php

declare(strict_types=1);

namespace App\Interfaces\Modules\UserModule\User;

use App\Models\UserModule\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

interface ReadUserInterface
{
     public function getUserByEmail(string $email): ?User;
     public function getAllUserForAdminDataTable(Request $request, ?object $auth = null): Builder;
     public function getUserById(int $id): User;
}