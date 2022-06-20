<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminBlogRequest extends FormRequest
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
            'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'preview' => 'required',
            'detail' => 'required',
            'sort' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên blog không được để trống',
            'picture.required' => 'hình ảnh chưa được chọn',
            'preview.required' => 'mô tả không được để trống',
            'detail.required' => 'chi tiết không được để trống',
            'sort.required' => 'Thứ tự không được để trống'
        ];
    }
}
