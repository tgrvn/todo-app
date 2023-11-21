<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'unique:users,username', 'max:255', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['same:password']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Імʼя не може бути пустим',
            'name.max' => 'Максимальна довжина поля "Імʼя" 255 символи',
            'name.string' => 'Імʼя не може цифрами',

            'username.required' => 'Нікнейм є обовʼязковим',
            'username.unique' => 'Користувач з таким нікнеймом вже зареєстрований',
            'username.min' => 'Нікнейм має бути мінімум 2 символа',
            'username.max' => 'Максимальна довжина нікнейму 255 символи',

            'email.required' => 'Пошта є обовʼязкововю',
            'email.email' => 'Вказанно невірну адресу електронної пошти',
            'email.unique' => 'Користувач з такою поштою вже зареєстрованний',

            'password.required' => 'Пароль є обовʼязковим',
            'password.confirmed' => 'Повторіть пароль',

            'password_confirmation.same' => 'Введені паролі не однакові',
        ];
    }
}
