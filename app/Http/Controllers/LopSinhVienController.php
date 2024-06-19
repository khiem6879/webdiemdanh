<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopSinhVien;
use Illuminate\Foundation\Auth\User as Authenticatable;
class LopSinhVienController extends Authenticatable
{
    public function danhSach()
    {
        $lopSinhViens = LopSinhVien::all();
        return view('lop_sinh_vien.danh-sach', compact('lopSinhViens'));
    }
}
