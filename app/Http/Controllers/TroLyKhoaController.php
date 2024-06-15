<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
class TroLyKhoaController extends Authenticatable
{
    public function trangChu()
    {
        return View('tro_ly_khoa/trang-chu');
    }
}
