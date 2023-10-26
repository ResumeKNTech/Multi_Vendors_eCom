<?php

namespace App\Http\Requests\Admin\UserRelationship;

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
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
        ];
    }

    /**
     * Custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'user_id.required' => ' Gian hàng là bắt buộc.',
            'user_id.integer' => ' Gian hàng phải là một số nguyên.',
            'category_id.required' => ' Danh mục là bắt buộc.',
            'category_id.integer' => ' Danh mục phải là một số nguyên.',
            'brand_id.required' => ' Thương hiệu là bắt buộc.',
            'brand_id.integer' => ' Thương hiệu phải là một số nguyên.',
        ];
    }
}
