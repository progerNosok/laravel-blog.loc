<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!Auth::user())
        {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имя обязательно для заполнения',
            'name.min' => 'Минимальная длина имени :min символов',
            'email.required' => 'Email обязателен для заполнения',
            'email.unique' => 'Этот email уже занят',
            'password.required' => 'Поле пароль обязательно для заполнения',
            'password.min' => 'Минимальня длина пароля :min символов',
            'password.confirmed' => 'Пароли не совпадают'
        ];
    }
}
