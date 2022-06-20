<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminChangePassRequest extends FormRequest
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
            'password' => 'required|min:6|max:20',
            'repassword'=> 'same:password'
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu không quá 20 ký tự',
            'repassword.same'=> 'Mật khẩu chưa khớp'
        ];
    }
}
