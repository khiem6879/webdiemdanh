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
    public function danhSach()
    {
        $giaoviens = GiaoVien::all();
        $giaoviens = GiaoVien::paginate(8);
        return view('giao_vien.danh-sach', compact('giaoviens'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
