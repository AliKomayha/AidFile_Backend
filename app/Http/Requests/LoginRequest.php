<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name' => 'required|string|exists:users,name',
            'password' => 'required|string|min:8',
        ];
    }
    public function messages()
    {
        return [
            'name.exists' => 'The provided name does not match our records.',
            'password.min' => 'The password must be at least 8 characters.',
        ];
    }
}
