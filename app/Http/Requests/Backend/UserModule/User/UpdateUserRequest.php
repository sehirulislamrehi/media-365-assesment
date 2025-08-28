<?php

namespace App\Http\Requests\Backend\UserModule\User;

use App\Enum\Modules\UserModule\UserTiersEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $userId = $this->route('id'); // or $this->user if route-model binding

        return [
            "name" => "required|string|max:50",
            "email" => [
                "required",
                "email",
                "max:50",
                Rule::unique('users', 'email')->ignore($userId),
            ],
            "phone" => [
                "nullable",
                "string",
                "max:15",
                Rule::unique('users', 'phone')->ignore($userId),
            ],
            "password" => "nullable|string|min:6|confirmed",
            "role_id" => "required|exists:roles,id",
            "is_active" => "required",
            "user_tiers" => [
                "required",
                Rule::in(UserTiersEnum::all())
            ]
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException($validator, response()->json([
            'status' => 'warning',
            'message' => $validator->errors()->first(),
            'data' => [],
        ], 200));
    }
}
