<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'description' => 'nullable|min:3',
            'image' => 'required|image|mimetypes:image/jpeg,image/png,image/jpg|max:5120',
            'founded_date' => 'nullable|date'
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Tên xe không được để trống',
            'description.min' => 'Mô tả phải có tối thiểu 3 ký tự',
            'image.required' => 'Hãy chọn hình ảnh của xe',
            'image.image' => 'File bạn nhập phải là kiểu ảnh',
            'image.mimes' => 'File bạn nhập phải có đuôi .jpg, .jpeg hoặc .png',
            'image.max' => 'File bạn nhập phải có kích thước nhỏ hơn 5GB',
            'founded_date.date' => 'Ngày thành lập không hợp lệ',
        ];

        return $messages;
    }
}
