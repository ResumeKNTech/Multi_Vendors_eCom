<?php

namespace App\Http\Requests\Admin\Brand;

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
            'logo_images' => 'required', // Đảm bảo validate đúng kiểu dữ liệu ảnh nếu cần
            'brand_name' => 'required|string|max:255',
            'is_featured' => 'required|in:public,cancel',
            'status' => 'required|in:published,draft',
        ];
    }

    public function messages()
    {
        return [
            'logo_images.required' => 'Vui lòng tải lên hình ảnh logo.',
            'brand_name.required' => 'Vui lòng nhập tên thương hiệu.',
            'brand_name.max' => 'Tên thương hiệu không được vượt quá 255 ký tự.',
            'is_featured.required' => 'Vui lòng chọn trạng thái nổi bật.',
            'is_featured.in' => 'Trạng thái nổi bật không hợp lệ.',
            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.in' => 'Trạng thái không hợp lệ.',
            // Thêm thông báo lỗi tùy chỉnh cho các trường khác ở đây (nếu cần)
        ];
    }
}
