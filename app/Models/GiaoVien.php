<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GiaoVien extends Authenticatable
{
    use HasFactory;

    protected $table = "giao_vien";
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'email', 'ho_ten', 'ngay_sinh', 'so_dien_thoai', 'so_cccd', 'dia_chi', 'mat_khau', 'khoa_id'
    ];

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

