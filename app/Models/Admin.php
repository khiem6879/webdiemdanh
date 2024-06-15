<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    protected $table = 'admin';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';

    public function getAuthPassword()
    {
        return $this->mat_khau;
    }
}
