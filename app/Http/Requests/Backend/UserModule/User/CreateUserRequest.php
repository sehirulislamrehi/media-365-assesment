<?php

namespace App\Http\Requests\Backend\UserModule\User;

use App\Enum\Modules\UserModule\UserTiersEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:50",
            "email" => "required|email|max:50|unique:users,email",
            "phone" => "nullable|string|max:15|unique:users,phone",
            "password" => "required|string|min:6|confirmed",
            "role_id" => "required|exists:roles,id",
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
