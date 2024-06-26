<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;

    protected $table = 'diem_danh_lop_hoc_phan';
    protected $primaryKey = 'ma_diem_danh';
    public $incrementing = false; // Để khóa chính không tự động tăng

    protected $fillable = [
        'ma_diem_danh',
        'ma_qr',
        'ma_lop',
        'thoi_gian_qr',
        'ngay',
    ];

    public function lopHocPhan()
    {
        return $this->belongsTo(LopHocPhan::class, 'ma_lop', 'ma_lop');
    }
}
