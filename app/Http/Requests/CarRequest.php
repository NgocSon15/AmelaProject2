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
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required',
            'car_model_id' => 'required',
            'manufactured_date' => 'nullable|date',
            'engine_capacity' => 'nullable|numeric|gt:0',
            'seat_number' => 'nullable|integer|min:1',
            'door_number' => 'nullable|integer|min:1',
            'quantity' => 'nullable|integer|min:0',
            'image' => 'required|image|mimetypes:image/jpeg,image/png,image/jpg|max:5120',
            'description' => 'required|min:3'
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Tên xe không được để trống',
            'name.min' => 'Tên xe phải có nhiều hơn 3 ký tự',
            'price.required' => 'Giá xe không được để trống',
            'price.numeric' => 'Giá xe phải là số',
            'price.min' => 'Giá xe không được nhỏ hơn 0',
            'brand_id.required' => 'Bạn phải chọn nhãn hiệu xe',
            'car_model_id.required' => 'Bạn phải chọn dòng xe',
            'manufactured_date.date' => 'Ngày sản xuất không hợp lệ',
            'engine_capacity.numeric' => 'Dung tích động cơ phải là số',
            'engine_capacity.gt' => 'Dung tích động cơ phải lớn hơn 0',
            'seat_number.integer' => 'Số ghế phải là số nguyên',
            'seat_number.min' => 'Số ghế phải lớn hơn 0',
            'door_number.integer' => 'Số cửa phải là số nguyên',
            'door_number.min' => 'Số cửa phải lớn hơn 0',
            'quantity.integer' => 'Số lượng phải là số nguyên',
            'quantity.min' => 'Số lượng không được nhỏ hơn 0',
            'image.required' => 'Hãy chọn hình ảnh của xe',
            'image.image' => 'File bạn nhập phải là kiểu ảnh',
            'image.mimes' => 'File bạn nhập phải có đuôi .jpg, .jpeg hoặc .png',
            'image.max' => 'File bạn nhập phải có kích thước nhỏ hơn 5GB',
            'image.mimetypes' => 'File bạn nhập phải là kiểu ảnh',
            'description.required' => 'Hãy nhập mô tả xe',
            'description.min' => 'Mô tả phải có tối thiểu 3 ký tự'
        ];

        return $messages;
    }
}
