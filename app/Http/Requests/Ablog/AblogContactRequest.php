<?php

namespace App\Http\Requests\Ablog;

use Illuminate\Foundation\Http\FormRequest;

class AblogContactRequest extends FormRequest
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
            'name'=> 'required',
            'email'=> 'required | email',
            'topic'=> 'required',
            'description'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'Họ tên không được để trống',
            'email.required'=> 'Email không được để trống',
            'email.email'=> 'Email chưa hợp lệ',
            'topic.required'=> 'Môn học không được để trống',
            'description.required'=> 'Bạn vui lòng nhập nội dung vào'
        ];
    }
}
