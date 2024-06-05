<?php

namespace App\Http\Controllers;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;


class TaiKhoanController extends Controller
{
    public function dangNhap()
    {
      return View('tai_khoan/dang-nhap');
    }

    public function dangKy()
    {
      return View('tai_khoan/dang-ky');
    }

}
