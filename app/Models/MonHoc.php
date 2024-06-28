<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;

    protected $table = 'mon_hoc';
    protected $primaryKey = 'ma_mon';
<<<<<<< HEAD
    public $incrementing = false;
=======
    public $incrementing = false; // Để khóa chính không tự động tăng
>>>>>>> 08477e33e18f42dd7aef1778779b0fbaccd7ae64

    protected $fillable = [
        'ma_mon',
        'ten_mon',
<<<<<<< HEAD
        
=======
>>>>>>> 08477e33e18f42dd7aef1778779b0fbaccd7ae64
        'khoa_id',
    ];

    public function khoa()
    {
        return $this->belongsTo(KhoaDaoTao::class, 'khoa_id');
    }
}
