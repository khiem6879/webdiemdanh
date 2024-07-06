<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SinhVienRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'ma_sinh_vien' => 'required|string|max:10|unique:sinh_vien,ma_sinh_vien,' . $this->ma_sinh_vien . ',ma_sinh_vien',

            'ho_ten' => 'required|string|max:255',
            'ngay_sinh' => 'required|date',
            'dia_chi' => 'required|string|max:255',
            'so_cccd' => 'required|string|max:12|unique:sinh_vien,so_cccd,'. $this->ma_sinh_vien . ',so_cccd',
            'so_dien_thoai' => 'required|string|regex:/^0[0-9]{9}$/|unique:sinh_vien,so_dien_thoai,' . $this->ma_sinh_vien . ',so_dien_thoai',
            'email' => 'required|email|max:255|unique:sinh_vien,email,' . $this->ma_sinh_vien . ',email',
            'mat_khau' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'ma_sinh_vien.required' => 'Mã sinh viên là bắt buộc.',
            'ma_sinh_vien.string' => 'Mã sinh viên phải là chuỗi.',
            'ma_sinh_vien.max' => 'Mã sinh viên không được vượt quá 10 ký tự.',
            'ma_sinh_vien.unique' => 'Mã sinh viên đã tồn tại.',
            'ho_ten.required' => 'Họ tên là bắt buộc.',
            'ho_ten.string' => 'Họ tên phải là chuỗi.',
            'ho_ten.max' => 'Họ tên không được vượt quá 255 ký tự.',
            'ngay_sinh.required' => 'Ngày sinh là bắt buộc.',
            'ngay_sinh.date' => 'Ngày sinh phải là định dạng ngày hợp lệ.',
            'dia_chi.required' => 'Địa chỉ là bắt buộc.',
            'dia_chi.string' => 'Địa chỉ phải là chuỗi.',
            'dia_chi.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'so_cccd.required' => 'Số CCCD là bắt buộc.',
            'so_cccd.string' => 'Số CCCD phải là chuỗi.',
            'so_cccd.max' => 'Số CCCD không được vượt quá 12 ký tự.',
            'so_cccd.unique' => 'Số CCCD đã tồn tại.',
            'so_dien_thoai.unique' => 'Số điện thoại đã tồn tại.',
            'so_dien_thoai.required' => 'Số điện thoại là bắt buộc.',
            'so_dien_thoai.string' => 'Số điện thoại phải là chuỗi.',
            'so_dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 chữ số.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải là định dạng email hợp lệ.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            'mat_khau.required' => 'Mật khẩu là bắt buộc.',
            'mat_khau.string' => 'Mật khẩu phải là chuỗi.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }
}
