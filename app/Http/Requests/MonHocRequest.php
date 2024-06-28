<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonHocRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'ten_mon' => 'required|string|max:1',
            'mo_ta' => 'nullable|string',
            'khoa_id' => 'required|exists:khoa_dao_taos,id',
        ];
    }
    public function messages()
    {
        return [
            'ten_mon.required' => 'ko bo trong',
            'mo_ta.required' => 'ko bo trong', // Custom message for mo_ta
            'khoa_id.required' => 'ko bo trong',
            'khoa_id.exists' => 'Khoa đào tạo không hợp lệ.',
        ];
    }
}
