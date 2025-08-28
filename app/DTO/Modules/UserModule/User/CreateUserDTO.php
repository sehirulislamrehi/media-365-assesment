<?php

namespace App\DTO\Modules\UserModule\User;

use App\Http\Requests\Backend\UserModule\User\CreateUserRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CreateUserDTO
{

    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $phone,
        public string $roleId,
        public string $userTiers,
        public bool $isSuperAdmin,
    ) {}

    /**
     * Create a new instance from the request.
     *
     * @param CreateUserRequest $request
     * @return self
     */
    public static function fromRequest(CreateUserRequest $request): self
    {
        return new self(
            name: $request->input('name'),
            email: $request->input('email'),
            password: Hash::make($request->input('password')), // hash if required
            phone: $request->input('phone'),
            roleId: $request->input('role_id'),
            userTiers: $request->input('user_tiers'),
            isSuperAdmin: $request->input('is_super_admin', false),
        );
    }

    /**
     * Convert the DTO to an array representation.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->phone,
            'role_id' => $this->roleId,
            'is_super_admin' => $this->isSuperAdmin,
            'user_tiers' => $this->userTiers,
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
