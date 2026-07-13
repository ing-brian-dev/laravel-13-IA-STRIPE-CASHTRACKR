<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignupRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->symbols()
                    ->numbers()
                    ->uncompromised(),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es válido',
            'email.unique' => 'El email ya esta registrado',
            'password.required' => 'La contraseña es requerida',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'Las contraseñas debe de ser de por lo menos :min caracteres',
            'password.letters' => 'La contraseña debe tener al menos 1 letra',
            'password.mixed' => 'La contraseña debe tener al menos 1 mayuscula y una letra minuscula',
            'password.symbols' => 'La contraseña debe tener al menos 1 caracter especial (@_-.*)',
            'password.numbers' => 'La contraseña debe contener por lo menos 1 numero',
            'password.uncompromised' => 'La contraseña ha aparecido en filtraciones de datos. Elige una más segura',
        ];
    }
}
