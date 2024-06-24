<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoiMatKhauRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'mat_khau' => 'required|string|min:8',
            'mat_khau_moi' => 'required|string|min:8|confirmed',
        ];
    }
     public function messages()
    {
        return [
            'mat_khau.required' => 'Mật khẩu hiện tại không được bỏ trống.',
            'mat_khau.min' => 'Mật khẩu hiện tại phải có ít nhất 8 ký tự.',
            'mat_khau_moi.required' => 'Mật khẩu mới không được bỏ trống.',
            'mat_khau_moi.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'mat_khau_moi.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
        ];
    }
}
