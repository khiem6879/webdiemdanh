<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TroLyKhoaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ho_ten' => 'required|string|max:40',
            'email' => 'required|email|max:50|unique:tro_ly_khoa,email',
            'mat_khau' => 'required|string|min:6',
            'khoa_id' => 'required|integer|exists:khoa_dao_tao,khoa_id',
            'so_dien_thoai' => 'required|string|regex:/^0[0-9]{9}$/|unique:tro_ly_khoa,so_dien_thoai',
            'avt' => 'nullable|image|max:20480',
        ];
    }

    public function messages()
    {
        return [
            'ho_ten.required' => 'Họ tên là bắt buộc.',
            'ho_ten.string' => 'Họ tên phải là chuỗi.',
            'ho_ten.max' => 'Họ tên không được vượt quá 40 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải là định dạng email hợp lệ.',
            'email.max' => 'Email không được vượt quá 50 ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            'mat_khau.required' => 'Mật khẩu là bắt buộc.',
            'mat_khau.string' => 'Mật khẩu phải là chuỗi.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'khoa_id.required' => 'Khoa đào tạo là bắt buộc.',
            'khoa_id.integer' => 'Khoa đào tạo phải là số nguyên.',
            'khoa_id.exists' => 'Khoa đào tạo không tồn tại.',
            'so_dien_thoai.required' => 'Số điện thoại là bắt buộc.',
            'so_dien_thoai.string' => 'Số điện thoại phải là chuỗi.',
            'so_dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 chữ số.',
            'so_dien_thoai.unique' => 'Số điện thoại đã tồn tại.',
            'avt.image' => 'Ảnh đại diện phải là định dạng hình ảnh.',
            'avt.max' => 'Ảnh đại diện không được vượt quá 2MB.',
        ];
    }
}
