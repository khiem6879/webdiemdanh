<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiemDanhNgoai;

class DiemDanhNgoaiController extends Controller
{
    public function danhSach()
    {
        $diemdanhngoais= DiemDanhNgoai::all();
        $diemdanhngoais =DiemDanhNgoai::paginate(5);
        return view('diem-danh-ngoai.danh_sach', compact('diemdanhngoais'));
       

    }
    
}
