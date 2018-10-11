<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserUpdate
 * @package App\Http\Requests
 */
class UserUpdate extends FormRequest
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
        $users = Auth::user();
        return [
            'name' => 'required|string|max:255|unique:users,name,'.$users->id.',id',
            'email' => 'required|string|email|max:255|unique:users,email,'.$users->id.',id',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'ユーザー名を入力してください',
            'name.unique' => '同じユーザー名が存在しています',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => '正しい形式で入力してください',
            'email.unique' => '同じメールアドレスが存在しています',
            'password.required' => 'パスワードを入力してください',
            'password.min' => '6文字以上入力してください',
            'password.confirmed' => 'パスワードが一致しません。入力し直してください。',
        ];
    }
}
