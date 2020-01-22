<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'post_id' => 'required',
            'detail' => 'required|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'detail.required' => 'コメントは必須項目です',
            'detail.max' => 'コメントは1000文字以内で入力ください'
        ];
    }
}
