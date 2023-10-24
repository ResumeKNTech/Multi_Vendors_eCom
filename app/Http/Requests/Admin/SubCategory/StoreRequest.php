<?php

namespace App\Http\Requests\Admin\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'sub_category_name' => 'required|string|max:255',
            'slug' => 'required|string|unique:sub_categories|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id', // Kiểm tra xem category_id có tồn tại trong bảng categories không
        ];
    }

    public function messages()
    {
        return [
            'sub_category_name.required' => 'Vui lòng nhập tên danh mục con.',
            'sub_category_name.max' => 'Tên danh mục con không được vượt quá 255 ký tự.',
            'slug.required' => 'Vui lòng nhập slug danh mục con.',
            'slug.unique' => 'Slug danh mục con đã tồn tại.',
            'category_id.required' => 'Vui lòng chọn danh mục chính.',
            'category_id.exists' => 'Danh mục chính không tồn tại.',
            // Thêm thông báo lỗi tùy chỉnh cho các trường khác ở đây (nếu cần)
        ];
    }
}
