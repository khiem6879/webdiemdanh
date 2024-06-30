<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemDanhLopHocPhan extends Model
{
    use HasFactory;
    protected $table = "diem_danh_lop_hoc_phan";
     // Khóa chính
     protected $primaryKey = 'ma_diem_danh';
     // Không sử dụng trường tự động tăng
     public $incrementing = false;
 
     // Kiểu dữ liệu của khóa chính là chuỗi
     protected $keyType = 'string';
 
    protected $fillable = ['ma_diem_danh', 'ma_qr', 'ma_lop', 'thoi_gian_qr', 'ngay'];
    public function lopHocPhan()
    {
        return $this->belongsTo(LopHocPhan::class, 'ma_lop');
    }
}
