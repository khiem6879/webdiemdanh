<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AdminController extends Authenticatable
{
    public function trangChu()
    {
        return View('admin/trang-chu');
    }
}
