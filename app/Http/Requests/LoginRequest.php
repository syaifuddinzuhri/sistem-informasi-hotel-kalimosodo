<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required'                        => 'Email tidak boleh kosong',
            'email.email'                           => 'Email tidak valid',
            'password.required'                     => 'Password tidak boleh kosong',
            'password.min'                          => 'Password minimal 8 karakter'
        ];
    }
}