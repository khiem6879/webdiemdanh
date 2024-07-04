<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhoaDaoTao;

class KhoaDaoTaoController extends Controller
{
   
    
    public function danhSach(){
   
      $khoas= KhoaDaoTao::all();
        $khoas = KhoaDaoTao::paginate(5);
        return view('khoa.danh-sach', compact('khoas'));
    }
}
