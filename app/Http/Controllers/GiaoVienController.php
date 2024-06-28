<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GiaoVienRequest;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use App\Models\GiaoVien;
use App\Models\KhoaDaoTao;
use Illuminate\Support\Facades\Auth;


class GiaoVienController extends Authenticatable
{
    public function trangChu()
    {
        return View('giao_vien/trang-chu');
    }


    public function danhSach()
    {
        // Kiểm tra xem người dùng đăng nhập có vai trò là gì
        if (Auth::guard('tro_ly_khoa')->check()) {
            // Nếu là trợ lý khoa
            $troLyKhoa = Auth::guard('tro_ly_khoa')->user();
            $khoaId = $troLyKhoa->khoa_id;
            // Lấy danh sách giáo viên theo khoa_id
            $giaoviens = GiaoVien::with('khoa')->where('khoa_id', $khoaId)->paginate(5);
        } elseif (Auth::guard('admin')->check()) {
            // Nếu là admin
            $giaoviens = GiaoVien::with('khoa')->paginate(5);
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('login');
        }

        // Trả về view với danh sách giáo viên
        return view('giao_vien.danh-sach', compact('giaoviens'));
    }

    public function them()
    {
        $khoas = KhoaDaoTao::all();
        return view('giao_vien.them', compact('khoas'));
    }

    public function xuLyThem(Request $request)
    {
        if (GiaoVien::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email already exists.'])->withInput();
        }

        $giaovien = new GiaoVien;
        $giaovien->email = $request->email;
        $giaovien->ho_ten = $request->ho_ten;
        $giaovien->mat_khau = Hash::make($request->mat_khau);
        $giaovien->khoa_id = $request->khoa_id;
        $giaovien->ngay_sinh = $request->ngay_sinh;
        $giaovien->so_dien_thoai = $request->so_dien_thoai;
        $giaovien->so_cccd = $request->so_cccd;
        $giaovien->dia_chi = $request->dia_chi;
        $giaovien->save();

        return redirect()->route('giao_vien.danh_sach');

        return redirect()->route('giao_vien.danh_sach');
    }
    public function danhSachGiaoVien()
    {
        $giaoviens = GiaoVien::all();
        return view('giao_vien.danh-sach-giao-vien', compact('giaoviens'));

    }

<<<<<<< HEAD
    public function sua($email) {
=======


    public function sua($email)
    {
>>>>>>> 08477e33e18f42dd7aef1778779b0fbaccd7ae64
        $giao_vien = GiaoVien::find($email);
        $khoas = KhoaDaoTao::all();
        return view('giao_vien.sua', compact('giao_vien', 'khoas'));
    }

<<<<<<< HEAD
{

    $giao_vien = GiaoVien::find($email);
    if ($giao_vien) 
    {

            $giao_vien->email = $request->input('email');
            $giao_vien->ho_ten = $request->input('ho_ten');
            $giao_vien->mat_khau = bcrypt($request->input('mat_khau'));
          
            $giao_vien->khoa_id= $request->input('khoa_id');
            $giao_vien->ngay_sinh = $request->input('ngay_sinh');
            $giao_vien->so_dien_thoai = $request->input('so_dien_thoai');
            $giao_vien->so_cccd = $request->input('so_cccd');
            $giao_vien->email = $request->input('email');
            $giao_vien->dia_chi = $request->input('dia_chi');
        
            $giao_vien->update($request->all());
        

     }
        return redirect()->route('giao_vien.danh_sach')->with('thong_bao', 'Cập nhật thành công!');
=======
    public function xuLySua(Request $request, $email)
    {

        $giao_vien = GiaoVien::find($email);
        if ($giao_vien) {
            $giao_vien->email = $request->input('email');
            $giao_vien->ho_ten = $request->input('ho_ten');
            if ($request->filled('mat_khau')) {
                $giao_vien->mat_khau = bcrypt($request->input('mat_khau'));
                $giao_vien->ten_khoa = $request->input('ten_khoa');
                $giao_vien->ngay_sinh = $request->input('ngay_sinh');
                $giao_vien->so_dien_thoai = $request->input('so_dien_thoai');
                $giao_vien->so_cccd = $request->input('so_cccd');
                $giao_vien->email = $request->input('email');

                $giao_vien->dia_chi = $request->input('dia_chi');

                $giao_vien->update($request->all());
                return redirect()->route('sinh_vien.danh_sach')->with('thong_bao', 'Cập nhật thành công!');

            }
            $giao_vien->khoa_id = $request->input('khoa_id');
            $giao_vien->ngay_sinh = $request->input('ngay_sinh');
            $giao_vien->so_dien_thoai = $request->input('so_dien_thoai');
            $giao_vien->so_cccd = $request->input('so_cccd');
            $giao_vien->dia_chi = $request->input('dia_chi');

            $giao_vien->save();

            return redirect()->route('giao_vien.danh_sach')->with('thong_bao', 'Cập nhật thành công!');
        }

        return redirect()->back()->with('error', 'Giáo viên không tồn tại.');
    }

>>>>>>> 08477e33e18f42dd7aef1778779b0fbaccd7ae64

}
            public function xoa($email)
            {
                $giao_vien = GiaoVien::find($email);
                if ($giao_vien) {
                    $giao_vien->delete();
                    return redirect()->route('giao_vien.danh_sach')->with('thong_bao', 'Xóa thành công!');
                }
                return redirect()->route('giao_vien.danh_sach')->with('error', 'giao viên không tồn tại.');


            }
            
        }