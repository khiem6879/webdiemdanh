<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class KhoaDaoTao extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'khoa_dao_tao';
    protected $primaryKey = 'khoa_id';
    protected $keyType = 'string';
   
    
    
    public function giaoViens()
    {
        return $this->hasMany(GiaoVien::class, 'khoa_id', 'khoa_id');
    }
    public function monHocs()
    {
        return $this->hasMany(MonHoc::class, 'khoa_id');
    }
}
