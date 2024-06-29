<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\TroLyKhoa;
use Illuminate\Support\Facades\Auth;
use App\Models\KhoaDaoTao;
use App\Models\GiaoVien;

class TroLyKhoaController extends Controller
{
    public function trangChu()
    {
        return view('tro_ly_khoa.trang-chu');
    }

    public function danhSach()
    {
        $trolykhoas = TroLyKhoa::with('khoa')->paginate(5);
        return view('tro_ly_khoa.danh-sach', compact('trolykhoas'));
    }

    public function them()
    {
        $khoas = KhoaDaoTao::all();
        return view('tro_ly_khoa.them', compact('khoas'));
    }
    public function danhSachGiaoVien()
    {
        // Lấy thông tin trợ lý khoa đang đăng nhập
        $troLyKhoa = Auth::guard('tro_ly_khoa')->user();
        
        // Kiểm tra xem trợ lý khoa đã đăng nhập chưa
        if ($troLyKhoa) {
            // Lấy khoa_id của trợ lý khoa
            $khoaId = $troLyKhoa->khoa_id;
            
            // Lấy danh sách giáo viên theo khoa_id
            $giaoViens = GiaoVien::where('khoa_id', $khoaId)->get();
            
            // Trả về view với danh sách giáo viên
            return view('giao_vien.danh_sach', compact('giaoViens'));
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('login');
        }
    }
    public function xuLyThem(Request $request)
    {
        $troLyKhoa = new TroLyKhoa();
        $troLyKhoa->ho_ten = $request->input('ho_ten');
        $troLyKhoa->email = $request->input('email');
        $troLyKhoa->mat_khau = Hash::make($request->input('mat_khau'));
        $troLyKhoa->khoa_id = $request->input('khoa_id');
        $troLyKhoa->so_dien_thoai = $request->input('so_dien_thoai');
        $troLyKhoa->thoi_gian_dang_nhap_cuoi = now();

        if ($request->hasFile('avt')) {
            $file = $request->file('avt');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $troLyKhoa->avt = $filename;
        } else {
            $troLyKhoa->avt = 'default-avatar.png';
        }
        // dd($request);

        $troLyKhoa->save();

        return redirect()->route('tro_ly_khoa.danh_sach')->with('thong_bao', 'Thêm mới Trợ lý Khoa thành công!');
    }

    // Thêm phương thức sửa
    public function sua($emai)
    {
        $troLyKhoa = TroLyKhoa::findOrFail($emai);
        $khoas = KhoaDaoTao::all();
        return view('tro_ly_khoa.sua', compact('troLyKhoa', 'khoas'));
    }

    public function xuLySua(Request $request, $id)
    {
        $troLyKhoa = TroLyKhoa::findOrFail($id);
        $troLyKhoa->ho_ten = $request->input('ho_ten');
        $troLyKhoa->email = $request->input('email');

        if ($request->input('mat_khau')) {
            $troLyKhoa->mat_khau = Hash::make($request->input('mat_khau'));
        }

        $troLyKhoa->khoa_id = $request->input('khoa_id');
        $troLyKhoa->so_dien_thoai = $request->input('so_dien_thoai');

        if ($request->hasFile('avt')) {
            $file = $request->file('avt');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $troLyKhoa->avt = $filename;
        }

        $troLyKhoa->save();

        return redirect()->route('tro_ly_khoa.danh_sach')->with('thong_bao', 'Cập nhật Trợ lý Khoa thành công!');
    }

    // Thêm phương thức xóa
    public function xoa($email)
    {
        $troLyKhoa = TroLyKhoa::find($email);
        $troLyKhoa->delete();

        return redirect()->route('tro_ly_khoa.danh_sach')->with('thong_bao', 'Xóa Trợ lý Khoa thành công!');
    }
}
