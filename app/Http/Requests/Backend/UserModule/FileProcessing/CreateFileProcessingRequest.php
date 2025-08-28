<?php

namespace App\Http\Requests\Backend\UserModule\FileProcessing;

use Illuminate\Foundation\Http\FormRequest;

class CreateFileProcessingRequest extends FormRequest
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
            'image_links' => [
                'required',
                'string',
                // Must be URLs separated by commas (no trailing comma)
                'regex:/^(https?:\/\/[^\s,]+)(\s*,\s*https?:\/\/[^\s,]+)*$/'
            ],
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
