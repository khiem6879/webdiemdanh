<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHocPhan extends Model
{
    use HasFactory;
    protected $table = 'lop_hoc_phan';
    protected $primaryKey = 'ma_lop';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $casts = [
        'giao_vien_email' => 'array',
        'sinh_vien_mssv' => 'array',
    ];
    protected $fillable = [
        'ma_lop', 'ten_lop', 'giao_vien_email', 'sinh_vien_mssv', 'khoa_id'
    ];

    public function khoa()
    {
        return $this->belongsTo(KhoaDaoTao::class, 'khoa_id');
    }
}
