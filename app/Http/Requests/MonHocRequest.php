<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonHocRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten_mon' => 'required|string|min:3|max:100',
            'khoa_id' => 'required|exists:khoa_dao_tao,khoa_id',
        ];
    }

    public function messages()
    {
        return [
            'ten_mon.required' => 'Tên môn học là bắt buộc.',
            'ten_mon.string' => 'Tên môn học phải là chuỗi ký tự.',
            'ten_mon.min' => 'Tên môn học phải có ít nhất 8 ký tự.',
            'ten_mon.max' => 'Tên môn học không được vượt quá 100 ký tự.',
            'khoa_id.required' => 'Khoa là bắt buộc.',
            'khoa_id.exists' => 'Khoa không tồn tại.',
        ];
    }
}
