<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemDanhLopHocPhan extends Model
{
    use HasFactory;
    protected $table = "diem_danh_lop_hoc_phan";
    protected $fillable = ['ma_diem_danh', 'ma_qr', 'ma_lop', 'thoi_gian_qr', 'ngay'];
}
