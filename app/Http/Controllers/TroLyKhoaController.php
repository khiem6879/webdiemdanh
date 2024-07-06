<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TroLyKhoaRequest;
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

    public function xuLyThem(TroLyKhoaRequest $request)
    {
        $troLyKhoa = new TroLyKhoa();
        $troLyKhoa->ho_ten = $request->input('ho_ten');
        $troLyKhoa->email = $request->input('email');
        $troLyKhoa->mat_khau = Hash::make($request->input('mat_khau'));
        $troLyKhoa->khoa_id = $request->input('khoa_id');
        $troLyKhoa->so_dien_thoai = $request->input('so_dien_thoai');
<<<<<<< HEAD
      
        $troLyKhoa->thoi_gian_dang_nhap_cuoi = now();
=======

>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02
        if ($request->hasFile('avt')) {
            $troLyKhoa->avt = $request->file('avt')->store('images', 'public');
        } else {
            $troLyKhoa->avt = 'images/default-avatar.png';
        }
        $troLyKhoa->save();
        return redirect()->route('tro_ly_khoa.danh_sach')->with('thong_bao', 'Thêm mới Trợ lý Khoa thành công!');
    }

    public function sua($email)
    {
        $troLyKhoa = TroLyKhoa::find($email);
        $khoas = KhoaDaoTao::all();
        return view('tro_ly_khoa.sua', compact('troLyKhoa', 'khoas'));
    }

    public function xuLySua(Request $request, $email)
    {
        $troLyKhoa = TroLyKhoa::where('email', $email)->first();
        
        if ($troLyKhoa) {
            $troLyKhoa->ho_ten = $request->input('ho_ten');
            $troLyKhoa->email = $request->input('email');
            
            if ($request->filled('mat_khau')) {
                $troLyKhoa->mat_khau = Hash::make($request->input('mat_khau'));
            }
    
            $troLyKhoa->khoa_id = $request->input('khoa_id');
            $troLyKhoa->so_dien_thoai = $request->input('so_dien_thoai');
         
        
    
            if ($request->hasFile('avt')) {
                $troLyKhoa->avt = $request->file('avt')->store('images', 'public');
            }
    
            $troLyKhoa->save();
    
            return redirect()->route('tro_ly_khoa.danh_sach')->with('thong_bao', 'Cập nhật Trợ lý Khoa thành công!');
        }
    
        return redirect()->route('tro_ly_khoa.danh_sach')->with('thong_bao', 'Trợ lý Khoa không tồn tại!');
    }
    

    public function xoa($email)
    {
        $troLyKhoa = TroLyKhoa::find($email);
        $troLyKhoa->delete();

        return redirect()->route('tro_ly_khoa.danh_sach')->with('thong_bao', 'Xóa Trợ lý Khoa thành công!');
    }
}
