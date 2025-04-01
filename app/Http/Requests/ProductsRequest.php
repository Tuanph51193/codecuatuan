<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cho phép tất cả request chạy
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'description.string' => 'Miêu tả phải là  phải là chuỗi',
            'price.min'=>'Gía k đc để trống',
            'quantity.required' => 'số  lượng phải là số nguyên dương',
            'image.required' => 'Anhr phải là jpeg png jpg gif',
        ];
    }
}

    



