<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SinhVienRequest extends FormRequest
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
            'ma_sinh_vien' => 'required|string|max:20|unique:sinh_vien',
            'ho_ten' => 'required|string|max:50',
            'ngay_sinh' => 'required|date',
            'dia_chi' => 'required|string|max:50',
            'so_cccd' => 'required|string|max:12',
            'email' => 'required|string|email|max:50|unique:sinh_vien',
            'mat_khau' => 'required|string|max:50',
            'so_dien_thoai' => 'required|string|max:11',
        ];
    }
}
