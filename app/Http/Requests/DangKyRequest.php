<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
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
    public function rules()
    {
        return [
            'ho_ten' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:sinh_vien,email',
            'mat_khau' => 'required|string|min:8|max:32',
            'xac_nhan_mat_khau' => 'required|same:mat_khau',
            'ngay_sinh' => 'required|date',
            'so_dien_thoai' => 'required|string|min:10|max:11',
            'ma_sinh_vien' => 'required|string|max:20|unique:sinh_vien,ma_sinh_vien',
            'so_cccd' => 'required|string|max:12',
            'dia_chi' => 'required|string|max:100',
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
            'xac_nhan_mat_khau.required' => 'Xác nhận mật khẩu không được bỏ trống.',
            'xac_nhan_mat_khau.same' => 'Xác nhận mật khẩu không khớp.',
            'ngay_sinh.required' => 'Ngày sinh là không được bỏ trống.',
            'so_dien_thoai.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
            'so_dien_thoai.max' => 'Số điện thoại tối đa 11 kí tự.',
            'so_dien_thoai.required' => 'Số điện thoại không được bỏ trống.',
            'ma_sinh_vien.required' => 'Mã sinh viên không được bỏ trống.',
            'ma_sinh_vien.unique' => 'Mã sinh viên đã được sử dụng.',
            'so_cccd.required' => 'Số CCCD không được bỏ trống.',
            'dia_chi.required' => 'Địa chỉ không được bỏ trống.',
        ];
        
    }
    
    
}
