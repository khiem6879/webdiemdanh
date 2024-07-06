<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhoaDaoTao;
use Illuminate\Support\Str;

class KhoaDaoTaoController extends Controller
{
    public function danhSach()
    {
        $khoadaotaos = KhoaDaoTao::paginate(5);
        return view('khoa.danh-sach', compact('khoadaotaos'));
    }

    public function them()
    {
        return view('khoa.them');
    }
    public function xuLyThem(Request $request)
    {
        $khoas = new KhoaDaoTao();
        $khoas->khoa_id = rand(100, 999);
        $khoas->ten_khoa=$request->input('ten_khoa');
        $khoas->save();
        return redirect()->route('khoa.danh_sach')->with('thong_bao','Thêm khoa đào tạo thành công!');
    }

    public function sua($khoa_id)
    {
        $khoa = KhoaDaoTao::findOrFail($khoa_id);
        return view('khoa.sua', compact('khoa'));
    }

    public function xuLySua(Request $request, $khoa_id)
    {
        $khoa = KhoaDaoTao::find($khoa_id);
        $khoa->ten_khoa = $request->input('ten_khoa');
        $khoa->save();
        return redirect()->route('khoa.danh_sach')->with('thong_bao', 'Cập nhật khoa thành công!');
    }

    public function xoa($khoa_id)
    {
        $khoa = KhoaDaoTao::findOrFail($khoa_id);
        $khoa->delete();

        return redirect()->route('khoa.danh_sach')->with('thong_bao', 'Xóa khoa đào tạo thành công!');
    }

    public function danhSachDaXoa()
    {
        $khoadaotaos = KhoaDaoTao::onlyTrashed()->paginate(5);
        return view('khoa.danh-sach-da-xoa', compact('khoadaotaos'));
    }

    public function khoiPhuc($khoa_id)
    {
        $khoa = KhoaDaoTao::withTrashed()->findOrFail($khoa_id);
        if ($khoa->trashed()) {
            $khoa->restore();
            return redirect()->route('khoa.danh_sach')->with('thong_bao', 'Khôi phục khoa đào tạo thành công!');
        }

        return redirect()->route('khoa.danh_sach')->with('error', 'Khoa đào tạo không tồn tại hoặc chưa bị xóa.');
    }
}
