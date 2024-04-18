<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
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
            'old_password'=>'required',
            'password'=>'required|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'old_password'=>'Bạn hãy nhập mật khẩu cũ',
            'password.required'=>'Bạn hãy nhập mật khẩu moi',
            'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
            'password.confirmed'=>'Hai mật khẩu không trùng khớp',
        ];
    }
}
