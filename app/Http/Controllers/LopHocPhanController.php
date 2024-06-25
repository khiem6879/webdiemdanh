<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LopHocPhan;
use App\Models\GiaoVien;
use App\Models\SinhVien;
use App\Models\KhoaDaoTao;
use App\Models\LopSinhVien;

class LopHocPhanController extends Controller
{

    public function danhSach()
    {

        // Lấy khoa_id từ session
        $khoa_id = session('khoa_id');

        // Lấy danh sách lớp học phần dựa trên khoa_id
        $lopHocPhans = LopHocPhan::where('khoa_id', $khoa_id)->get();

        return view('lop_hoc_phan.danh-sach', compact('lopHocPhans'));
    }

    public function themLopHocPhan()
    {

        $uniqueMaLop = generateUniqueMaLop(); // Gọi hàm để sinh mã lớp duy nhất
        $khoa_id = session('khoa_id');
        
        // Lấy giáo viên thuộc khoa đang đăng nhập
        $giaoViens = GiaoVien::where('khoa_id', $khoa_id)->get();

        // Lấy lớp sinh viên thuộc khoa đang đăng nhập
        $lopSinhViens = LopSinhVien::where('khoa_id', $khoa_id)->get();

        // Lấy tất cả sinh viên thuộc các lớp trong khoa
        $sinhViens = SinhVien::whereIn('ma_sinh_vien', $lopSinhViens->pluck('sinh_vien_mssv'))->get();

        return view('lop_hoc_phan.them', compact('uniqueMaLop','giaoViens', 'sinhViens', 'lopSinhViens'));
    }

    public function xulythemLopHocPhan(Request $request)
    {
        $lopHocPhan = new LopHocPhan();
        $lopHocPhan->ma_lop = generateUniqueMaLop();
        $lopHocPhan->ten_lop = $request->input('ten_lop');
        $lopHocPhan->giao_vien_email = json_encode($request->input('giao_vien'));
        $lopHocPhan->sinh_vien_mssv = json_encode($request->input('sinh_vien'));
        $lopHocPhan->khoa_id = $request->input('khoa_id');
        $lopHocPhan->save();
        // dd($request);
        return redirect()->route('tro_ly_khoa.trang_chu')->with('success', 'Thêm lớp học phần thành công.');

    }

}
