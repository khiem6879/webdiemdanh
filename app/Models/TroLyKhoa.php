<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TroLyKhoa extends Authenticatable
{
    use HasFactory;
    protected $table = 'tro_ly_khoa';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ho_ten',
        'so_dien_thoai',
        'email',
        'khoa_id',
        'mat_khau',
        'thoi_gian_dang_nhap_cuoi',
        'avt',
    ];

    public function getAuthPassword()
    {
        return $this->mat_khau;
    }

    public function khoa()
    {
        return $this->belongsTo(KhoaDaoTao::class, 'khoa_id', 'khoa_id');
    }
    
}
