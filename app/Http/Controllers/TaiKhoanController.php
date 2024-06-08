<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\GiaoVien;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TaiKhoanController extends Controller
{
  public function dangNhap()
  {
    return View('tai_khoan/dang-nhap');
  }
  public function xulyDangNhap(Request $rq)
  {
      // Kiểm tra xem người dùng là Sinh viên hay Giáo viên
      $sinh_vien = SinhVien::where('email', $rq->email)->first();
      $giao_vien = GiaoVien::where('email', $rq->email)->first();
  
      if ($sinh_vien && Hash::check($rq->mat_khau, $sinh_vien->mat_khau)) {
          // Nếu là Sinh viên và mật khẩu đúng
          if (Auth::guard('sinh_vien')->attempt(['email' => $rq->email, 'mat_khau' => $rq->mat_khau])) {
              return redirect()->route('trang-chu')->with('thong_bao', 'ĐĂNG NHẬP THÀNH CÔNG');
          }
      } else if ($giao_vien && Hash::check($rq->mat_khau, $giao_vien->mat_khau)) {
          // Nếu là Giáo viên và mật khẩu đúng
          if (Auth::guard('giao_vien')->attempt(['email' => $rq->email, 'mat_khau' => $rq->mat_khau])) {
              return redirect()->route('trang-chu')->with('thong_bao', 'ĐĂNG NHẬP THÀNH CÔNG');
          }
      }
      // Nếu không phải Sinh viên hoặc Giáo viên, hoặc mật khẩu không đúng
      return redirect()->route('DangNhap')->with('thong_bao', 'ĐĂNG NHẬP THẤT BẠI');
  }
  



  public function dangKy()
  {
    return View('tai_khoan/dang-ky');
  }
  public function themtaikhoanGiaoVien(Request $request)
  {

    $dsGV = new GiaoVien();

    $dsGV->email = $request->email;
    $dsGV->mat_khau = Hash::make($request->mat_khau); // Hash mật khẩu
    $dsGV->save();
    return redirect()->route('DangNhap')->with('thong_bao', 'TẠO TÀI KHOẢN THÀNH CÔNG');

  }

}