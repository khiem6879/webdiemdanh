<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopSinhVien;
use App\Models\GiaoVien;
use App\Models\SinhVien;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;

class LopSinhVienController extends Authenticatable
{
    public function danhSach()
    {
        // Lấy email giáo viên đang đăng nhập
        $giaoVienEmail = Auth::user()->email;

        // Lọc các lớp sinh viên theo email giáo viên
        $lopSinhViens = LopSinhVien::where('giao_vien_email', $giaoVienEmail)->get();

        return view('lop_sinh_vien.danh-sach', compact('lopSinhViens'));

    }
    public function themLopSinhVien()
    {
        $uniqueMaLop = generateUniqueMaLop(); // Gọi hàm để sinh mã lớp duy nhất
        $khoa_id = session('khoa_id');
        $sinhViens = SinhVien::all();
        $giaoVien = GiaoVien::where('email', Auth::user()->email)->first();
        // Lấy giáo viên thuộc khoa đang đăng nhập

        return view('lop_sinh_vien.them', compact('uniqueMaLop', 'giaoVien', 'sinhViens', ));
    }
    public function xulythemLopSinhVien(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('dang_nhap')->with('thong_bao', 'Phiên đăng nhập đã hết hạn. Vui lòng đăng nhập lại.');
        }
        $lopSinhVien = new LopSinhVien();
        $lopSinhVien->ma_lop = generateUniqueMaLop();
        $lopSinhVien->ten_lop = $request->input('ten_lop');
        $lopSinhVien->giao_vien_email = $request->input('giao_vien');
        $lopSinhVien->sinh_vien_mssv = json_encode($request->input('sinh_vien'));
        $lopSinhVien->khoa_id = $request->input('khoa_id');
        $lopSinhVien->save();
        //  dd($request);
        return redirect()->route('giao_vien.lop_sinh_vien.danh_sach')->with('thong_bao', 'Thêm lớp sinh viên thành công.');

    }
    public function chiTiet($ma_lop)
    {
        $lopSinhVien = LopSinhVien::where('ma_lop', $ma_lop)->first();
        $sinhviens = json_decode($lopSinhVien->sinh_vien_mssv);

        $students = SinhVien::whereIn('ma_sinh_vien', $sinhviens)->paginate(5);
        return view('lop_sinh_vien.chi-tiet', compact('lopSinhVien', 'students'));
    }
    

}
