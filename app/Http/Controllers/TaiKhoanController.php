<?php

namespace App\Http\Controllers;

use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DoiMatKhauRequest;
use App\Http\Requests\CapNhatTaiKhoanRequest;
use Illuminate\Http\Request;
use App\Models\GiaoVien;
use App\Models\SinhVien;
use App\Models\Admin;
use App\Models\KhoaDaoTao;
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
      session(['user_role' => 'giao_vien', 'khoa_id' => $giao_vien->khoa_id]);
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
  private function layThongTinNguoiDung()
  {
    $user = null;
    $role = session('user_role');

    if ($role === 'sinh_vien') {
      $user = Auth::guard('sinh_vien')->user();
    } elseif ($role === 'giao_vien') {
      $user = Auth::guard('giao_vien')->user();
    } elseif ($role === 'admin') {
      $user = Auth::guard('admin')->user();
    } elseif ($role === 'tro_ly_khoa') {
      $user = Auth::guard('tro_ly_khoa')->user();
    }

    if (!$user) {
      return redirect()->route('DangNhap')->with('thong_bao', 'Vui lòng đăng nhập để tiếp tục.');
    }

    return compact('user', 'role',);
  }

  public function thongtinTaiKhoan()
  {

    $data = $this->layThongTinNguoiDung();

    if ($data['user']) {
      return view('tai_khoan.thong-tin-tai-khoan', $data);
    } else {
      return redirect()->route('DangNhap')->with('thong_bao', 'Vui lòng đăng nhập để xem thông tin tài khoản.');
    }
  }




  public function suaTaiKhoan()
  {

    $data = $this->layThongTinNguoiDung();

    if ($data['user']) {
      return view('tai_khoan.cap-nhat-tai-khoan', $data);
    } else {
      return redirect()->route('DangNhap')->with('thong_bao', 'Vui lòng đăng nhập để chỉnh sửa thông tin tài khoản.');
    }
  }

  public function xulysuaTaiKhoan(Request $request)
  {
    $user = null;
    $role = session('user_role');
    // dd($role);
    if ($role === 'sinh_vien') {
      $user = Auth::guard('sinh_vien')->user();
      $user->update($request->all());
    } elseif ($role === 'giao_vien') {
      $user = Auth::guard('giao_vien')->user();
      $user->update($request->all());
    } elseif ($role === 'admin') {
      $user = Auth::guard('admin')->user();
      $user->update($request->all());
    } elseif ($role === 'tro_ly_khoa') {
      $user = Auth::guard('tro_ly_khoa')->user();
      // dd($request->all());
      $user->update($request->all());
    }


    return redirect()->route('tai_khoan.thong-tin-tai-khoan')->with('thong_bao', 'Cập nhật thông tin thành công.');
  }

  public function dangKy()
  {
    return View('tai_khoan/dang-ky');
  }
  public function xulyDangKy(DangKyRequest $request)
  {
    if ($request->mat_khau === $request->xac_nhan_mat_khau) {
      $dsSV = new SinhVien();
      $dsSV->ma_sinh_vien = $request->ma_sinh_vien;
      $dsSV->ho_ten = $request->ho_ten;
      $dsSV->ngay_sinh = $request->ngay_sinh;
      $dsSV->dia_chi = $request->dia_chi;
      $dsSV->so_cccd = $request->so_cccd;
      $dsSV->email = $request->email;
      $dsSV->so_dien_thoai = $request->so_dien_thoai;
      $dsSV->mat_khau = Hash::make($request->mat_khau); // Hash mật khẩu  
      $dsSV->save();
      return redirect()->route('DangNhap')->with('thong_bao', 'TẠO TÀI KHOẢN THÀNH CÔNG');
    }
    return redirect()->route('DangKy')->with('thong_bao', 'TẠO TÀI KHOẢN KHÔNG THÀNH CÔNG');
  }

  public function hienThiDoiMatKhau()
  {
    $data = $this->layThongTinNguoiDung();


    if ($data['user']) {
      return view('tai_khoan.doi-mat-khau', $data);
    } else {
      return redirect()->route('DangNhap')->with('thong_bao', 'Vui lòng đăng nhập để đổi mật thông tin tài khoản.');
    }
  }

  public function doiMatKhau(DoiMatKhauRequest $request)
  {

    $data = $this->layThongTinNguoiDung();

    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (!$data['user']) {
      return redirect()->route('DangNhap')->with('thong_bao', 'Vui lòng đăng nhập để đổi mật khẩu.');
    }
    // dd($data['user']);
    // Kiểm tra mật khẩu hiện tại
    if (!Hash::check($request->mat_khau, $data['user']->mat_khau)) {
      return back()->withErrors(['mat_khau' => 'Mật khẩu hiện tại không chính xác']);
    }

    // Cập nhật mật khẩu mới
    $data['user']->mat_khau = Hash::make($request->mat_khau_moi);
    $data['user']->save();

    return redirect()->route('tai_khoan.thong-tin-tai-khoan')->with('thong_bao', 'Đổi mật khẩu thành công');
  }
  public function dangXuat()
  {
    Auth::guard(session('user_role'))->logout();
    session()->flush();
    return redirect()->route('DangNhap')->with('thong_bao', 'ĐĂNG XUẤT THÀNH CÔNG');
  }

}