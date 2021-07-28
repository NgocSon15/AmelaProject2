<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'brand_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|mimetypes:image/jpeg,image/png,image/jpg|max:5120',
            'description' => 'required|min:3'
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Hãy nhập tên xe',
            'price.required' => 'Hãy nhập giá xe',
            'price.numeric' => 'Giá xe phải là số',
            'brand_id.required' => 'Hãy chọn nhãn hiệu xe',
            'image.required' => 'Hãy chọn hình ảnh của xe',
            'description.required' => 'Hãy nhập mô tả xe'
        ];

        return $messages;
    }
}
