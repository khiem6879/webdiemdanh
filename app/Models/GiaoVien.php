<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GiaoVien extends Authenticatable
{
    use HasFactory;
    protected $table = "giao_vien";
    // Khóa chính
    protected $primaryKey = 'email';
    // Không sử dụng trường tự động tăng
    public $incrementing = false;

    // Kiểu dữ liệu của khóa chính là chuỗi
    protected $keyType = 'string';
    public function getAuthPassword()
    {
        return $this->mat_khau;
    }
    public function lopHocPhans()
    {
        return $this->belongsToMany(LopHocPhan::class, 'giao_vien_lop_hoc_phan', 'giao_vien_email', 'lop_hoc_phan_ma_lop');
    }
    public function khoa()
    {
        return $this->belongsTo(KhoaDaoTao::class, 'khoa_id');
    }
   
}
