<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagsRequest extends FormRequest
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
            'title' => 'required|min:3|max:255|unique:tags'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Это поле обязательно для заполнения",
            "title.min" => "Минимальня длина Тега :min",
            "title.max" => "Максимальня длина Тега :max",
            "title.unique" => "Тег с там именем уже существует. Придумай другой"
        ];
    }
}
