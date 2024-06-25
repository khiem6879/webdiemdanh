<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopSinhVien extends Model
{
    use HasFactory;
    
    protected $table = 'lop_sinh_vien';
    protected $primaryKey = 'ma_lop';
    public $incrementing = false;

    protected $fillable = [
        'ma_lop',
        'ten_lop',
        'giao_vien_email',
        'sinh_vien_mssv',
        'khoa_id'
    ];

    protected $casts = [
        'sinh_vien_mssv' => 'array', // Ép kiểu cột sinh_vien_mssv thành array
    ];

    public function giaoVien()
    {
        return $this->belongsTo(GiaoVien::class, 'giao_vien_email', 'email');
    }

    public function khoa()
    {
        
        return $this->belongsTo(KhoaDaoTao::class, 'khoa_id', 'khoa_id');
    }
    public function getSinhVienMssvAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setSinhVienMssvAttribute($value)
    {
        $this->attributes['sinh_vien_mssv'] = json_encode($value);
    }

   
    public function sinhViens()
    {
        return $this->belongsToMany(SinhVien::class, 'lop_sinh_vien', 'ma_lop', 'ma_sinh_vien');
    }

}
