<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDiemDanhLopHocPhan extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_diem_danh_lop_hoc_phan';

    protected $fillable = [
        'ma_diem_danh',
        'sinh_vien_mssv',
        'trang_thai',
        'thoi_gian',
        'vi_tri'
    ];

    protected $casts = [
        'sinh_vien_mssv' => 'array', // Chuyển đổi JSON thành mảng tự động
    ];
}
