<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\GiaoVien;
use App\Models\KhoaDaoTao;
use Illuminate\Support\Facades\Hash; // Thêm dòng này
class GiaoVienController extends Authenticatable
{
    public function trangChu()
    {
        return View('giao_vien/trang-chu');
    }
    
    public function danhSach()
    {
        $giaoviens = GiaoVien::with('khoa')->paginate(5);
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
        $giaovien->ten_khoa = $request->ten_khoa;
        $giaovien->ngay_sinh = $request->ngay_sinh;
        $giaovien->so_dien_thoai = $request->so_dien_thoai;
        $giaovien->so_cccd = $request->cccd;
        $giaovien->dia_chi = $request->dia_chi;
        $giaovien->save();

        return redirect()->route('giao_vien.danh_sach');
    }

}
