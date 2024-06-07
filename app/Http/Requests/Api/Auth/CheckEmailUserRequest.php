<?php

namespace App\Http\Requests\Api\Auth;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class CheckEmailUserRequest extends FormRequest
{
    use ApiResponseTrait;

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
            'email' => ['required', 'email', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email should be type email',
            'email.max' => 'Email maximum length was 255 character',
        ];
    }

    public function failedValidation($validator)
    {
        return ApiResponseTrait::failedValidation($validator, [], 'Validation Error', 422);
    }
}
