<?php

namespace App\Http\Requests\Admin\Category;

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
            'category_name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories|max:255',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Vui lòng nhập tên danh mục.',
            'category_name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'slug.required' => 'Vui lòng nhập slug danh mục.',
            'slug.unique' => 'Slug danh mục đã tồn tại.',
            // Thêm thông báo lỗi tùy chỉnh cho các trường khác ở đây (nếu cần)
        ];
    }
}
