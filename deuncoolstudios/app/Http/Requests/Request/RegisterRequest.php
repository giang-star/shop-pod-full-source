<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules()
    {
        return [
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|min:6|confirmed',
            //
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Bạn hãy nhập email',
            'email.email'=>'Bạn hãy nhập email',
            'email.max'=>'Email không quá 255 kí tự',
            'email.unique'=>'Email đã được sử dụng',
            'password.required'=>'Bạn hãy nhập mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
            'password.confirmed'=>'Hai mật khẩu không trùng khớp',
        ];
    }
}
