<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\SinhVien;
class SinhVienController extends Authenticatable
{
    public function trangChu()
    {
        return view('sinh_vien.trang-chu');
    }

    public function danhSachSinhVien()
    {
        $sinhviens = SinhVien::all();
        return view('sinh_vien.danh-sach-sinh-vien', compact('sinhviens'));
    }

    public function themSinhVien()
    {
        return view('sinh_vien.them-sinh-vien');
    }

    public function xuLyThemSinhVien(Request $request)
    {
        $sinhvien = new SinhVien;
        $sinhvien->ma_sinh_vien = $request->ma_sinh_vien;
        $sinhvien->ho_ten = $request->ho_ten;
        $sinhvien->ngay_sinh = $request->ngay_sinh;
        $sinhvien->so_dien_thoai = $request->so_dien_thoai;
        $sinhvien->so_cccd = $request->so_cccd;
        $sinhvien->email = $request->email;
        $sinhvien->mat_khau = $request->mat_khau;
        $sinhvien->dia_chi = $request->dia_chi;
        $sinhvien->save();

        return redirect()->route('sinh_vien.danh_sach');
    }
    public function capNhatSinhVien($MSSV)
    {
        $sinh_vien = SinhVien::find($MSSV);
        if ($sinh_vien) {
            return view('sinh_vien.cap-nhat-sinh-vien', ['sinh_vien' => $sinh_vien]);
        }
    
        return redirect()->route('sinh_vien.danh_sach')->with('error', 'Sinh viên không tồn tại.');
    }
    public function xuLyCapNhatSinhVien(Request $request, $MSSV)
{
    $sinh_vien = SinhVien::find($MSSV);
    if ($sinh_vien) {
        $sinh_vien->ma_sinh_vien = $request->input('ma_sinh_vien');
        $sinh_vien->ho_ten = $request->input('ho_ten');
        $sinh_vien->ngay_sinh = $request->input('ngay_sinh');
        $sinh_vien->so_dien_thoai = $request->input('so_dien_thoai');
        $sinh_vien->so_cccd = $request->input('so_cccd');
        $sinh_vien->email = $request->input('email');
        $sinh_vien->mat_khau = bcrypt($request->input('mat_khau'));
        $sinh_vien->dia_chi = $request->input('dia_chi');

        $sinh_vien->save();

        return redirect()->route('sinh_vien.danh_sach')->with('success', 'Cập nhật sinh viên thành công.');
    }

    return redirect()->back()->with('error', 'Sinh viên không tồn tại.');
}



}
