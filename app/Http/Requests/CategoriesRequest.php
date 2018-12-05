<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'title' => 'required|min:3|max:255|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Это поле обязательно для заполнения",
            "title.min" => "Минимальня длина Категории :min",
            "title.max" => "Максимальня дляна Категории :max",
            "title.unique" => "Категория с таким именем уже существует. Придумай другое"
        ];
    }
}
