<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'nik' => ['required', 'digits:16'],
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'password_confirmation' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'no_hp' => ['required', 'string', 'min:12', 'max:15']
        ];
    }

    public function messages()
    {
        return [
            'password.confirmed' => 'Password confirmation does not match.',
        ];
    }
}
