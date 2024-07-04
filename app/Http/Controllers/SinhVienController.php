<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\SinhVien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class SinhVienController extends Authenticatable
{
    public function trangChu()
    {
        return view('sinh_vien.trang-chu');
    }

    public function danhSachSinhVien()
    {
        $sinhviens = SinhVien::all();
        $sinhviens = SinhVien::orderBy('created_at', 'desc')->paginate(10);
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

    public function xuLyThem(Request $request)
    {
        $request->validate([
            'ma_sinh_vien' => 'required|unique:sinh_viens,ma_sinh_vien',
            'email' => 'required|email|unique:sinh_viens,email',
            // Các trường khác
        ]);

        $sinhvien = new SinhVien;
        $sinhvien->ma_sinh_vien = $request->ma_sinh_vien;
        $sinhvien->ho_ten = $request->ho_ten;
        $sinhvien->ngay_sinh = $request->ngay_sinh;
        $sinhvien->so_dien_thoai = $request->so_dien_thoai;
        $sinhvien->so_cccd = $request->so_cccd;
        $sinhvien->email = $request->email;
        $sinhvien->mat_khau = Hash::make($request->so_cccd);
        $sinhvien->dia_chi = $request->dia_chi;
        $sinhvien->save();

        return redirect()->route('sinh_vien.danh_sach')->with('thong_bao', 'Thêm sinh viên thành công!');
    }

    public function uploadExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $filePath = $request->file('file')->getRealPath();
        $data = Excel::toArray([], $filePath)[0]; // Lấy sheet đầu tiên

        $errors = [];
        $successCount = 0;
        $existingCount = 0;

        foreach ($data as $index => $row) {
            if ($index == 0) {
                // Bỏ qua hàng tiêu đề
                continue;
            }

            // Kiểm tra nếu hàng không có dữ liệu thì bỏ qua
            if (empty($row[0]) && empty($row[1]) && empty($row[2]) && empty($row[3]) && empty($row[4]) && empty($row[5]) && empty($row[6])) {
                continue;
            }

            $ma_sinh_vien = $row[0];
            $email = $row[5];

            // Kiểm tra tồn tại của ma_sinh_vien và email
            if (SinhVien::where('ma_sinh_vien', $ma_sinh_vien)->exists() || SinhVien::where('email', $email)->exists()) {
                $errors[] = "{$ma_sinh_vien}";
                $existingCount++;
                continue;
            }

            // Kiểm tra và chuyển đổi ngày tháng từ chuỗi thành ngày tháng
            try {
                $ngay_sinh = Carbon::createFromFormat('d/m/Y', $row[2])->format('Y-m-d');
            } catch (\Exception $e) {
                $ngay_sinh = null;
            }

            try {
                SinhVien::create([
                    'ma_sinh_vien' => $ma_sinh_vien,
                    'ho_ten' => $row[1],
                    'ngay_sinh' => $ngay_sinh,
                    'dia_chi' => $row[3],
                    'so_cccd' => $row[4],
                    'email' => $email,
                    'so_dien_thoai' => $row[6],
                    'mat_khau' => Hash::make($row[4]), // Hash mật khẩu từ số cccd
                ]);
                $successCount++;
            } catch (\Exception $e) {
                $errors[] = "Lỗi khi thêm sinh viên với MSSV {$ma_sinh_vien}: " . $e->getMessage();
            }
        }
        // Tạo thông báo tổng hợp
        $message = '';
        if ($successCount > 0) {
            $message .= "Thêm {$successCount} sinh viên thành công.";
        }
        if ($existingCount > 0) {
            $message .= "{$existingCount} sinh viên đã tồn tại.";
        }
        if (count($errors) > 0) {
            $message .= " Lỗi với " . count($errors) . " sinh viên: " . implode(", ", $errors);
        }

        return redirect()->route('sinh_vien.danh_sach')->with('thong_bao', $message);
    }

    public function xoaSinhVien($MSSV)
    {
        $sinhvien = SinhVien::find($MSSV);
        if ($sinhvien) {
            $sinhvien->delete();
            return redirect()->route('sinh_vien.danh_sach')->with('thong_bao', 'Xóa sinh viên thành công.');
        }

        return redirect()->route('sinh_vien.danh_sach')->with('error', 'Sinh viên không tồn tại.');
    }


    public function sua($ma_sinh_vien)
    {
        $sinh_vien = SinhVien::find($ma_sinh_vien);
        return view('sinh_vien.cap-nhat', compact('sinh_vien'));
    }

    public function xuLySua(Request $request, $ma_sinh_vien)
    {
        $sinh_vien = SinhVien::find($ma_sinh_vien);
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
    public function xoaHet()
    {
        SinhVien::truncate();
        return redirect()->route('sinh_vien.danh_sach')->with('thong_bao', 'Đã xóa toàn bộ sinh viên.');
    }
}
