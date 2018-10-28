<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

/**
 * Class PostCreate
 * @package App\Http\Requests
 */
class PostCreate extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        $users = Auth::user();

        return [
            'title' => 'required|string|max:100|unique:posts,title,'.$users->id.',user_id',
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
            'title.unique' => '同じタイトル名が存在しています',
            'title.max' => 'タイトルは100文字以内で入力してください',
            'comment.required' => 'コメントを入力してください',
            'comment.max' => 'コメントは400文字以内で入力してください',
            'yotei.required' => '予定を登録してください',
        ];
    }

}