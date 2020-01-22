<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'required|max:100',
            'description' => 'required|max:1000',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須項目です',
            'title.max' => 'タイトルは100文字以内で入力してください',
            'description.required' => '詳細は必須項目です',
            'description.max' => '詳細は1000文字以内で入力してください',
            'category_id.required' => 'カテゴリーは必須項目です'
        ];
    }
}
