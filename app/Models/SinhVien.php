<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class SinhVien extends Authenticatable
{
    use HasFactory,SoftDeletes;

    // Tên bảng
    protected $table = 'sinh_vien';

    // Khóa chính
    
    protected $primaryKey = 'ma_sinh_vien';

    // Khóa chính không tự tăng
    public $incrementing = false;

    // Kiểu dữ liệu của khóa chính là chuỗi

    protected $keyType = 'string';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'ma_sinh_vien', 'ho_ten', 'ngay_sinh', 'dia_chi', 'so_cccd', 'so_dien_thoai', 'email', 'mat_khau',
    ];
    public function getAuthPassword()
    {
        return $this->mat_khau;
    }
    public function lopSinhVien()
    {
        return $this->belongsToMany(LopSinhVien::class, 'lop_sinh_vien', 'ma_sinh_vien', 'ma_lop');
    }
 
}
