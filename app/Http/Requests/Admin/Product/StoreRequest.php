<?php

namespace App\Http\Requests\Admin\Product;

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
            'product_name' => 'required|string|max:255',
            'product_title' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'images' => 'required', // Đảm bảo validate đúng kiểu dữ liệu ảnh nếu cần
            'images_gallery' => 'required', // Tương tự với images
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'sales_begin' => 'nullable|date',
            'sales_end' => 'nullable|date',
            'stock' => 'required|integer|min:0',
            'stock_status' => 'required|in:in_stock,out_of_stock',
            'status' => 'required|in:published,draft',
            'publish' => 'required|date',
            'sub_category_id' => 'nullable|exists:sub_categories,id', // Kiểm tra xem sub_category_id có tồn tại trong bảng sub_categories không
            'category_id' => 'nullable|exists:categories,id', // Tương tự với category_id
            'brand_id' => 'nullable|exists:brands,id', // Tương tự với brand_id
        ];
    }

    public function messages()
    {
        return [
            // Thêm thông báo tùy chỉnh cho từng luật kiểm tra ở đây
            'product_name.required' => 'Vui lòng nhập tên sản phẩm.',
            'product_title.required' => 'Vui lòng nhập tiêu đề sản phẩm.',
            'slug.required' => 'Vui lòng nhập slug sản phẩm.',
            'slug.unique' => 'Slug sản phẩm đã tồn tại.',
            'price.required' => 'Vui lòng nhập giá sản phẩm.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',
            // Thêm thông báo tùy chỉnh cho các trường khác ở đây
        ];
    }
}
