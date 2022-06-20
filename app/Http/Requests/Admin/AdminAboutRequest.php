<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminAboutRequest extends FormRequest
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
            'name' => 'required',
            'preview' => 'required',
            'detail' => 'required',
            'sort' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên giới thiệu không được để trống',
            'preview.required' => 'Mô tả không được để trống',
            'detail.required' => 'Chi tiết không được để trống',
            'sort.required' => 'Thứ tự không được để trống'
        ];
    }
}
