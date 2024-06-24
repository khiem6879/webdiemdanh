<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\GiaoVien;
class GiaoVienController extends Authenticatable
{
    public function trangChu()
    {
        return View('giao_vien/trang-chu');
    }
    public function danhSachGiaoVien(){
        $giaoviens= GiaoVien::all();
        return view('giao_vien.danh-sach-giao-vien', compact('giaoviens'));
    }

}
