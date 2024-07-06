<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SinhVienRequest;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\SinhVien;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SinhVienController extends Authenticatable
{
    public function trangChu()
    {
        return view('sinh_vien.trang-chu');
    }

    public function danhSachSinhVien()
    {
      
        $sinhviens = SinhVien::paginate(5);
        return view('sinh_vien.danh-sach-sinh-vien', compact('sinhviens'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function timKiem(Request $request)
    {
        $search = $request->input('search');
        $query = SinhVien::query();

        if ($search !== null) {
            $query->where('ma_sinh_vien', 'LIKE', "%$search%")
                ->orWhere('ho_ten', 'LIKE', "%$search%")
                ->orWhere('so_cccd', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('so_dien_thoai', 'LIKE', "%$search%");
        }

        $sinhviens = $query->get();

        $output = '';
        if ($sinhviens->count() > 0) {
            foreach ($sinhviens as $sinhvien) {
                $output .= '
                <tr>
                    <td>' . $sinhvien->ma_sinh_vien . '</td>
                    <td>' . $sinhvien->ho_ten . '</td>
                    <td>' . $sinhvien->ngay_sinh . '</td>
                    <td>' . $sinhvien->so_dien_thoai . '</td>
                    <td>' . $sinhvien->so_cccd . '</td>
                    <td>' . $sinhvien->email . '</td>
                    <td>
                        <span class="password-field" id="password-' . $sinhvien->ma_sinh_vien . '"
                            onclick="togglePassword(\'' . $sinhvien->ma_sinh_vien . '\', \'' . $sinhvien->mat_khau . '\')">
                            ' . substr($sinhvien->mat_khau, 0, 8) . '...
                        </span>
                    </td>
                    <td>' . $sinhvien->dia_chi . '</td>
                    <td>
                        <div class="form-button-action">
                            <a href="' . route('sinh_vien.sua', $sinhvien->ma_sinh_vien) . '" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" data-original-title="Edit Task">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </td>
                </tr>';
            }
        } else {
            $output = '<tr><td colspan="9">Không tồn tại sinh viên</td></tr>';
        }

        return response()->json($output);
    }
    public function themSinhVien()
    {
        return view('sinh_vien.them-sinh-vien');
    }

    public function xuLyThem(SinhVienRequest $request)
{
    $sinhvien = new SinhVien;
    $sinhvien->ma_sinh_vien = $request->ma_sinh_vien;
    $sinhvien->ho_ten = $request->ho_ten;
    $sinhvien->ngay_sinh = $request->ngay_sinh;
    $sinhvien->so_dien_thoai = $request->so_dien_thoai;
    $sinhvien->so_cccd = $request->so_cccd;
    $sinhvien->email = $request->email;
    $sinhvien->mat_khau = Hash::make($request->mat_khau);
    $sinhvien->dia_chi = $request->dia_chi;
    $sinhvien->save();

    return redirect()->route('sinh_vien.danh_sach')->with('thong_bao', 'Thêm sinh viên thành công!');
}

    public function sua($ma_sinh_vien)
    {
        $sinh_vien = SinhVien::where('ma_sinh_vien', $ma_sinh_vien)->first();
        return view('sinh_vien.cap-nhat', compact('sinh_vien'));
    }

    public function xuLySua(SinhVienRequest $request, $ma_sinh_vien)
    {
      
        $sinh_vien = SinhVien::where('ma_sinh_vien', $ma_sinh_vien)->first();
        if ($sinh_vien) {
            $sinh_vien->ma_sinh_vien = $request->input('ma_sinh_vien');
            $sinh_vien->ho_ten = $request->input('ho_ten');
            $sinh_vien->ngay_sinh = $request->input('ngay_sinh');
            $sinh_vien->so_dien_thoai = $request->input('so_dien_thoai');
            $sinh_vien->so_cccd = $request->input('so_cccd');
            $sinh_vien->email = $request->input('email');
            $sinh_vien->mat_khau = bcrypt($request->input('mat_khau'));
            $sinh_vien->dia_chi = $request->input('dia_chi');

            $sinh_vien->update($request->all());
            return redirect()->route('sinh_vien.danh_sach')->with('thong_bao', 'Cập nhật thành công!');
        }

        return redirect()->back()->with('error', 'Sinh viên không tồn tại.');
    }
    public function xoa($ma_sinh_vien)
    {
        $sinh_vien = SinhVien::find($ma_sinh_vien);
        if ($sinh_vien) {
            $sinh_vien->delete();
            return redirect()->route('sinh_vien.danh_sach')->with('thong_bao', 'Xóa thành công!');
        }
        return redirect()->route('sinh_vien.danh_sach')->with('error', 'Sinh viên không tồn tại.');
    }
    public function khoiPhuc($ma_sinh_vien)
    {
        $sinhvien = SinhVien::withTrashed()->find($ma_sinh_vien);
        if ($sinhvien) {
            $sinhvien->restore();
            return redirect()->route('sinh_vien.danh_sach')->with('thong_bao', 'Khôi phục sinh viên thành công.');
        }

        return redirect()->route('sinh_vien.danh_sach')->with('error', 'Sinh viên không tồn tại.');
    }

    public function danhSachDaXoa()
    {
        $sinhviens = SinhVien::onlyTrashed()->paginate(5);
        return view('sinh_vien.danh-sach-da-xoa', compact('sinhviens'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    
}
