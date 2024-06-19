<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemDanhNgoai extends Model
{
    use HasFactory;
    protected $table = "diem_danh_ngoai";
    // Khóa chính
    protected $primaryKey = 'ma_diem_danh';
    // Không sử dụng trường tự động tăng
    public $incrementing = false;

    // Kiểu dữ liệu của khóa chính là chuỗi
    protected $keyType = 'string';
}
