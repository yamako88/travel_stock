<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserUpdate
 * @package App\Http\Requests
 */
class PostUpdate extends FormRequest
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
            'title' => 'required|string|max:100',
            'comment' => 'required|string|max:400',
            'yotei' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルは100文字以内で入力してください',
            'comment.required' => 'コメントを入力してください',
            'comment.max' => 'コメントは400文字以内で入力してください',
            'yotei.required' => '予定を登録してください',
        ];
    }
}
