<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiaoVienRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:giao_vien,email,' . $this->route('giao_vien'),
            

            'mat_khau' => 'required|string|min:8',
            'khoa_id' => 'required|exists:khoa_dao_tao,id',
            'ngay_sinh' => 'required|date',
            'so_dien_thoai' => 'required|string|size:10',
            'so_cccd' => 'required|string|size:12',
            'dia_chi' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'ho_ten.required' => 'Họ tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.unique' => 'Email này đã được sử dụng.',
            'mat_khau.required' => 'Mật khẩu là bắt buộc.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'khoa_id.required' => 'Khoa là bắt buộc.',
            'khoa_id.exists' => 'Khoa không hợp lệ.',
            'ngay_sinh.required' => 'Ngày sinh là bắt buộc.',
            'ngay_sinh.date' => 'Ngày sinh không hợp lệ.',
            'so_dien_thoai.required' => 'Số điện thoại là bắt buộc.',
            'so_dien_thoai.size' => 'Số điện thoại phải có đúng 10 ký tự.',
            'so_cccd.required' => 'CCCD là bắt buộc.',
            'so_cccd.size' => 'CCCD phải có đúng 12 ký tự.',
            'dia_chi.required' => 'Địa chỉ là bắt buộc.'
        ];
    }
}
