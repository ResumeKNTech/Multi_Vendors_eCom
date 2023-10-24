<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_image' => 'nullable|string', // Đảm bảo validate đúng kiểu dữ liệu hình ảnh nếu cần
            'gender' => 'required|in:men,woman',
            'type_user' => 'required|in:customer,vendor',
            'address' => 'nullable|string',
            'birthday' => 'required|date',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8', // Định nghĩa các luật kiểm tra bảo mật mật khẩu ở đây
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'first_name.required' => 'Vui lòng nhập tên đầu tiên.',
            'last_name.required' => 'Vui lòng nhập họ và tên đệm.',
            'gender.required' => 'Vui lòng chọn giới tính.',
            'gender.in' => 'Giới tính không hợp lệ.',
            'type_user.required' => 'Vui lòng chọn loại người dùng.',
            'type_user.in' => 'Loại người dùng không hợp lệ.',
            'birthday.required' => 'Vui lòng nhập ngày sinh.',
            'birthday.date' => 'Ngày sinh phải là ngày hợp lệ.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Địa chỉ email đã tồn tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
        ];
    }
}
