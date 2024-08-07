<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonHoc extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mon_hoc';
    protected $primaryKey = 'ma_mon';

    public $incrementing = false; // Để khóa chính không tự động tăng


    protected $fillable = [
        'ma_mon',
        'ten_mon',
        'khoa_id',
    ];

    public function khoa()
    {
        return $this->belongsTo(KhoaDaoTao::class, 'khoa_id');
    }
}
