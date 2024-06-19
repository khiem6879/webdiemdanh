<?php

namespace App\Http\Controllers;

use App\Models\TroLyKhoa;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
class TroLyKhoaController extends Authenticatable
{
    public function trangChu()
    {
        return View('tro_ly_khoa/trang-chu');
    }
    public function danhSach()
    {
        $troLyKhoas = TroLyKhoa::with('khoa')->get();
        return view('tro_ly_khoa.danh-sach', compact('troLyKhoas'));
    }
}