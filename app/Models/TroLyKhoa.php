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

    public function getAuthPassword()
    {
        return $this->mat_khau;
    }
}
