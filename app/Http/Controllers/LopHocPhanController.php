<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LopHocPhan;
use App\Models\GiaoVien;
use App\Models\SinhVien;
use App\Models\KhoaDaoTao;
class LopHocPhanController extends Controller
{

    public function danhSach()
    {
        $lopHocPhans = LopHocPhan::with('khoa')->get();
        return view('lop_hoc_phan.danh-sach', compact('lopHocPhans'));
    }

    public function themLopHocPhan()
    {
        $giaoViens = GiaoVien::all();
        $sinhViens = SinhVien::all();
        $khoaDaoTao = KhoaDaoTao::all();
        return view('lop_hoc_phan.them', compact('giaoViens', 'sinhViens', 'khoaDaoTao'));
    }


    public function xulythemLopHocPhan(Request $request)
    {
        $lopHocPhan = new LopHocPhan();
        $lopHocPhan->ma_lop = $request->input('ma_lop');
        $lopHocPhan->ten_lop = $request->input('ten_lop');
        $lopHocPhan->giao_vien_email = json_encode($request->input('giao_vien'));
        $lopHocPhan->sinh_vien_mssv = json_encode($request->input('sinh_vien'));
        $lopHocPhan->khoa_id = $request->input('khoa_id');
        $lopHocPhan->save();
        return redirect()->route('tro_ly_khoa.danh_sach')->with('success', 'Thêm lớp học phần thành công.');
    }

}
