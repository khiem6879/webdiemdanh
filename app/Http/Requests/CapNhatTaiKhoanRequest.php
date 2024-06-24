<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapNhatTaiKhoanRequest extends FormRequest
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
            'email' => 'required|email|max:50',
            'ho_ten' => 'required|string|max:50',
            'so_cccd' => 'required|string|max:12',
            'so_dien_thoai' => 'required|string|min:10|max:11',
            'ngay_sinh' => 'required|date',
            'dia_chi' => 'required|string|max:100',
            'thoi_gian_dang_nhap_cuoi' => 'nullable|date', // Cho phép trường này là null và phải là kiểu ngày
            'avt' => 'required',
            // 'avt' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Cho phép trường này là null và phải là ảnh
        ];
    }
    public function messages()
    {
        return [
            'ho_ten.required' => 'Họ tên không được bỏ trống.',
            'email.required' => 'Email không được bỏ trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'mat_khau.required' => 'Mật khẩu không được bỏ trống.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 8-32 ký tự.',
            'ngay_sinh.required' => 'Ngày sinh là không được bỏ trống.',
            'so_dien_thoai.required' => 'Số điện thoại không được bỏ trống.',
            'so_dien_thoai.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
            'so_dien_thoai.max' => 'Số điện thoại tối đa 11 kí tự.',
            'so_cccd.required' => 'Số CCCD không được bỏ trống.',
            'dia_chi.required' => 'Địa chỉ không được bỏ trống.',
            'thoi_gian_dang_nhap_cuoi.date' => 'Thời gian đăng nhập cuối phải là một ngày hợp lệ.',
            'avt.required'=>"k bỏ trống"
            // 'avt.image' => 'Tệp phải là một hình ảnh.',
            // 'avt.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
            // 'avt.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
        
    }
}
