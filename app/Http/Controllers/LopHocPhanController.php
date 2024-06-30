<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LopHocPhan;
use App\Models\GiaoVien;
use App\Models\SinhVien;
use App\Models\KhoaDaoTao;


use App\Models\LopSinhVien;
use App\Models\MonHoc;
use Illuminate\Support\Facades\Auth;

class LopHocPhanController extends Controller
{

    public function danhSach()
    {
        if (Auth::guard('tro_ly_khoa')->check()) {
            $troLyKhoa = Auth::guard('tro_ly_khoa')->user();
            $khoaId = $troLyKhoa->khoa_id;
            $lopHocPhans = LopHocPhan::where('khoa_id', $khoaId)->paginate(5);
        } elseif (Auth::guard('admin')->check()) {
            $lopHocPhans = LopHocPhan::paginate(5);
        } elseif (Auth::guard('giao_vien')->check()) {
            $giaoVien = Auth::guard('giao_vien')->user();
            $email = $giaoVien->email;

            // Truy vấn với whereRaw
            $lopHocPhans = LopHocPhan::whereRaw("INSTR(giao_vien_email, '$email') > 0")->paginate(5);

            // dd($lopHocPhans);

        } else {
            return redirect()->route('login');
        }

        return view('lop_hoc_phan.danh-sach', compact('lopHocPhans'));
    }

    public function themLopHocPhan()
    {
        $uniqueMaLop = generateUniqueMaLop();
        $khoa_id = session('khoa_id');

        // Lấy giáo viên thuộc khoa đang đăng nhập
        $giaoViens = GiaoVien::where('khoa_id', $khoa_id)->paginate(5);

        // Lấy lớp sinh viên thuộc khoa đang đăng nhập
        $lopSinhViens = LopSinhVien::where('khoa_id', $khoa_id)->get();

        $sinhVienDetails = [];
        foreach ($lopSinhViens as $lopSinhVien) {
            $mssvArray = json_decode($lopSinhVien->sinh_vien_mssv);
            foreach ($mssvArray as $mssv) {
                $sinhVien = SinhVien::where('ma_sinh_vien', $mssv)->first();
                if ($sinhVien) {
                    $sinhVienDetails[] = [
                        'ma_sinh_vien' => $sinhVien->ma_sinh_vien,
                        'ho_ten' => $sinhVien->ho_ten,
                        'lop' => $lopSinhVien->ten_lop,
                        'lop_id' => $lopSinhVien->id
                    ];
                }
            }
        }

        // Lấy tất cả môn học thuộc khoa đang đăng nhập
        $monHocs = MonHoc::where('khoa_id', $khoa_id)->get();

        // Lấy tất cả các lớp theo khoa đang đăng nhập
        $lopHocs = LopSinhVien::where('khoa_id', $khoa_id)->get();

        return view('lop_hoc_phan.them', compact('uniqueMaLop', 'giaoViens', 'sinhVienDetails', 'monHocs', 'lopHocs'));
    }
    public function xulythemLopHocPhan(Request $request)
    {
        $lopHocPhan = new LopHocPhan();
        $lopHocPhan->ma_lop = generateUniqueMaLop();
        $lopHocPhan->ten_lop = $request->input('ten_lop');
        $lopHocPhan->giao_vien_email = json_encode($request->input('giao_vien'));
        $lopHocPhan->sinh_vien_mssv = json_encode($request->input('sinh_vien'));
        $lopHocPhan->khoa_id = $request->input('khoa_id');
        $lopHocPhan->ma_mon = $request->input('ma_mon');
        $lopHocPhan->save();
        // dd($request);
        return redirect()->route('tro_ly_khoa.lop_hoc_phan.danh_sach')->with('thong_bao', 'Thêm lớp học phần thành công.');

    }

    public function chiTiet($ma_lop)
    {
        $lopHocPhan = LopHocPhan::where('ma_lop', $ma_lop)->first();
        $sinhvienIds = json_decode($lopHocPhan->sinh_vien_mssv, true);
        $giaovienEmails = json_decode($lopHocPhan->giao_vien_email, true);

        $students = SinhVien::whereIn('ma_sinh_vien', $sinhvienIds)->paginate(5);

        return view('lop_hoc_phan.chi-tiet', compact('lopHocPhan', 'students', 'giaovienEmails'));
    }




    
}
