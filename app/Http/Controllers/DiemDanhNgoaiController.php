<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiemDanhNgoai;

class DiemDanhNgoaiController extends Controller
{
    public function danhSach()
    {
        return view ('diem_danh_ngoai.danh-sach-diem-danh');

    }
    
}
