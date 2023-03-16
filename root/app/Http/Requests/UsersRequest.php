<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    // バリデーションの設定
    public function rules()
    {
        return [
            'last_name' => 'required | max:100',
            'first_name' =>'required | max:100',
            'last_name_kana' =>'required | max:100',
            'first_name_kana' =>'required | max:100',
            'prefecture' =>'required | max:255',
            'address1' =>'required | max:255',
            'address2' =>'required | max:255',
            'email' =>'required | max:255 | unique:users,email',
            'password' =>'required | max:100',
            'join_date' =>'required'
        ];
    }
    public function messages()
    {
        return[
            'last_name.required' =>'ユーザー名は必須です。'
        ];
    }
}
