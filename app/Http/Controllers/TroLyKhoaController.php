<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\TroLyKhoa;
use App\Models\KhoaDaoTao;

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
}
