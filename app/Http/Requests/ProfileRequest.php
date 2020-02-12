<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'photo_id' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'division' => 'max:30',
            'specialty' => 'max:30',
            'hobby' => 'max:30',
            'biography' => 'max:1000'
        ];
    }

    public function messages()
    {
        return [
            'photo_id.mimes' => 'ファイル形式はjpeg,png,jpg,gifでアップロードしてください',
            'photo_id.max' => '2MB以内のファイルをアップロードしてください',
            'division.max' => '所属は30文字以内で入力してください',
            'specialty.max' => '専門は30文字以内で入力してください',
            'hobby.max' => '趣味は30文字以内で入力してください',
            'description.max' => '自己紹介は1000文字以内で入力してください'
        ];
    }
}
