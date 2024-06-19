<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiaoVien;
use App\Models\SinhVien;
use App\Models\Admin;
use App\Models\TroLyKhoa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TaiKhoanController extends Controller
{
  public function dangNhap()
  {
    return View('tai_khoan/dang-nhap');
  }
  public function xulyDangNhap(Request $rq)
  {
    // Lấy thông tin đăng nhập từ request
    $email = $rq->email;
    $password = $rq->mat_khau;

    // Tìm kiếm theo email và kiểm tra chính xác trường hợp chữ
    $sinh_vien = SinhVien::whereRaw('BINARY `email` = ?', [$email])->first();
    $giao_vien = GiaoVien::whereRaw('BINARY `email` = ?', [$email])->first();
    $admin = Admin::whereRaw('BINARY `email` = ?', [$email])->first();
    $tro_ly_khoa = TroLyKhoa::whereRaw('BINARY `email` = ?', [$email])->first();

    if ($sinh_vien && Hash::check($rq->mat_khau, $sinh_vien->mat_khau)) {
      Auth::guard('sinh_vien')->login($sinh_vien);
      session(['user_role' => 'sinh_vien']);
      return redirect()->route('sinh_vien.trang_chu')->with('thong_bao', 'ĐĂNG NHẬP THÀNH CÔNG');
    } elseif ($giao_vien && Hash::check($rq->mat_khau, $giao_vien->mat_khau)) {
      Auth::guard('giao_vien')->login($giao_vien);
      session(['user_role' => 'giao_vien', 'khoa_id'=>$giao_vien->khoa_id]);
      // dd(session('user_role'), session('khoa_id'));
      return redirect()->route('giao_vien.trang_chu')->with('thong_bao', 'ĐĂNG NHẬP THÀNH CÔNG');
    } elseif ($admin && Hash::check($rq->mat_khau, $admin->mat_khau)) {
      Auth::guard('admin')->login($admin);
      session(['user_role' => 'admin']);
      return redirect()->route('admin.trang_chu')->with('thong_bao', 'ĐĂNG NHẬP THÀNH CÔNG');
    } elseif ($tro_ly_khoa && Hash::check($rq->mat_khau, $tro_ly_khoa->mat_khau)) {
      Auth::guard('tro_ly_khoa')->login($tro_ly_khoa);
      session(['user_role' => 'tro_ly_khoa', 'khoa_id' => $tro_ly_khoa->khoa_id]);
      // dd(session('user_role'), session('khoa_id'));
      return redirect()->route('tro_ly_khoa.trang_chu')->with('thong_bao', 'ĐĂNG NHẬP THÀNH CÔNG');
    } else {
      return redirect()->route('DangNhap')->with('thong_bao', 'ĐĂNG NHẬP THẤT BẠI');
    }
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