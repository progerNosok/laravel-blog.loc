<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title' => 'required|min:5|unique:posts',
            'image' => 'nullable|image',
            'category_id' => 'required',
            'tags' => 'required',
            'description' => 'required|min:5',
            'content' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле название обязательно для заполнения',
            'title.min' => 'Минимальная длина названия :min символов',
            'title.unique' => 'Пост с таким именем уже есть. Придумай другой',
            'image.image' => 'Файл должен быть картинкой',
            'category_id.required' => 'Выбери категорию для поста',
            'tags.required' => 'Выбери хотя бы один тег для поста',
            'content.required' => 'Поле описание обязательно для заполнения',
            'content.min' => 'Минимальная длина текста поста :min символов',
        ];
    }
}
