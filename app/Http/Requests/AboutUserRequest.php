<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUserRequest extends FormRequest
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
            'status' => 'min:3',
            'country' => 'string|min:3',
            'city' => 'string|min:3',
            'about' => 'string|min:10',
            'hobbies' => 'string|min:5',
        ];
    }

    public function messages()
    {
        return [
            'string' => 'нельзя использовать одни цыфры',
            'status.min' => 'Минимальная длина статуса :min',
            'country.min' => 'Минимальная длина страны :min',
            'city.min' => 'Минимальная длина города :min',
            'about.min' => 'Минимальная длина рассказа о себе :min',
            'hobbies.min' => 'Минимальная длина рассказа о своих увлечениях :min',
        ];
    }
}
