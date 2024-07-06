<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiaoVienRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Nếu bạn muốn hạn chế quyền truy cập, có thể điều chỉnh lại logic ở đây
    }

    public function rules()
    {
        return [
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'mat_khau' => 'required|string|min:6',
            'khoa_id' => 'required|integer|exists:khoas,id',
            'ngay_sinh' => 'required|date',
            'so_dien_thoai' => 'required|string|max:15',
            'so_cccd' => 'required|string|max:12',
            'dia_chi' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'ho_ten.required' => 'Họ tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'mat_khau.required' => 'Mật khẩu là bắt buộc.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'khoa_id.required' => 'Khoa là bắt buộc.',
            'khoa_id.exists' => 'Khoa không tồn tại.',
            'ngay_sinh.required' => 'Ngày sinh là bắt buộc.',
            'so_dien_thoai.required' => 'Số điện thoại là bắt buộc.',
            'so_cccd.required' => 'CCCD là bắt buộc.',
            'dia_chi.required' => 'Địa chỉ là bắt buộc.',
        ];
    }
}
