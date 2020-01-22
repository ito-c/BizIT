<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest_vali extends FormRequest
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
            'name' => 'required|max:10',
            'description' => 'required|max:1000',
        ];
        
    }

    public function messages()
    {
        return [
            'name.required' => 'カテゴリー名は必須項目です',
            'name.max' => 'カテゴリー名は10文字以内で入力してください',
            'description.required' => '申請の詳細・理由は必須項目です',
            'description.max' => '申請の詳細・理由は1000文字以内で入力してください',
        ];
    }
}
