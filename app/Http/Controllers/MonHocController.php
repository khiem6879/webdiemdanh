<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonHocRequest;
use Illuminate\Http\Request;
use App\Models\MonHoc;
use App\Models\KhoaDaoTao;
use Illuminate\Support\Str;

class MonHocController extends Controller
{
    public function danhSach()
    {
        $monhocs = MonHoc::with('khoa')->paginate(5);
        return view('mon_hoc.danh-sach', compact('monhocs'));
    }

    public function them()
    {
        $khoas = KhoaDaoTao::all();
        return view('mon_hoc.them', compact('khoas'));
    }

    public function xuLyThem(MonHocRequest $request)
    {
        $monHoc = new MonHoc();
        $monHoc->ma_mon = Str::random(8); 
        $monHoc->ten_mon = $request->input('ten_mon');
        $monHoc->khoa_id = $request->input('khoa_id');
        $monHoc->save();

        return redirect()->route('mon_hoc.danh-sach')->with('thong_bao', 'Thêm mới môn học thành công!');
    }

    public function sua($ma_mon)
    {
        $monHoc = MonHoc::find($ma_mon);
        $khoas = KhoaDaoTao::all();
        return view('mon_hoc.sua', compact('monHoc', 'khoas'));
    }

    public function xuLySua(MonHocRequest $request, $ma_mon)
    {
        $monHoc = MonHoc::find($ma_mon);
        $monHoc->ten_mon = $request->input('ten_mon');
        $monHoc->khoa_id = $request->input('khoa_id');
        $monHoc->save();

        return redirect()->route('mon_hoc.danh-sach')->with('thong_bao', 'Cập nhật môn học thành công!');
    }

    public function xoa($ma_mon)
    {
        $monHoc = MonHoc::where('ma_mon', $ma_mon)->first();
        if ($monHoc) {
            $monHoc->delete();
            return redirect()->route('mon_hoc.danh-sach')->with('thong_bao', 'Xóa môn học thành công!');
        }
        return redirect()->route('mon_hoc.danh-sach')->with('thong_bao', 'Không tìm thấy môn học cần xóa!');
    }

    public function danhSachDaXoa()
    {
        $monhocs = MonHoc::onlyTrashed()->paginate(5);
        return view('mon_hoc.danh-sach-da-xoa', compact('monhocs'));
    }

    public function khoiPhuc($ma_mon)
    {
        $monHoc = MonHoc::withTrashed()->find($ma_mon);
        if ($monHoc && $monHoc->trashed()) {
            $monHoc->restore();
            return redirect()->route('mon_hoc.danh-sach')->with('thong_bao', 'Khôi phục môn học thành công!');
        }
        return redirect()->route('mon_hoc.danh-sach')->with('error', 'Môn học không tồn tại hoặc chưa bị xóa.');
    }
}
