<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GiaoVienRequest;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use App\Models\GiaoVien;
use App\Models\KhoaDaoTao;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;


class GiaoVienController extends Authenticatable
{
    public function trangChu()
    {
        return View('giao_vien/trang-chu');
    }


    public function danhSach()
    {
        // Kiểm tra xem người dùng đăng nhập có vai trò là gì
        if (Auth::guard('tro_ly_khoa')->check()) {
            // Nếu là trợ lý khoa
            $troLyKhoa = Auth::guard('tro_ly_khoa')->user();
            $khoaId = $troLyKhoa->khoa_id;
            // Lấy danh sách giáo viên theo khoa_id
            $giaoviens = GiaoVien::with('khoa')->where('khoa_id', $khoaId)->paginate(5);
        } elseif (Auth::guard('admin')->check()) {
            // Nếu là admin
            $giaoviens = GiaoVien::with('khoa')->paginate(5);
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('login');
        }

        // Trả về view với danh sách giáo viên
        return view('giao_vien.danh-sach', compact('giaoviens'));
    }

    public function them()
{
    $khoas = KhoaDaoTao::all();
    return view('giao_vien.them', compact('khoas'));
}


    public function xuLyThem( GiaoVienRequest $request)
    {
        if (GiaoVien::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email already exists.'])->withInput();
        }

        $giaovien = new GiaoVien;
        $giaovien->email = $request->email;
        $giaovien->ho_ten = $request->ho_ten;
<<<<<<< HEAD
        $giaovien->mat_khau = $request->mat_khau;
=======
        $giaovien->mat_khau = Hash::make($request->so_cccd);
>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02
        $giaovien->khoa_id = $request->khoa_id;
        $giaovien->ngay_sinh = $request->ngay_sinh;
        $giaovien->so_dien_thoai = $request->so_dien_thoai;
        $giaovien->so_cccd = $request->so_cccd;
        $giaovien->dia_chi = $request->dia_chi;
        $giaovien->save();

        return redirect()->route('giao_vien.danh_sach')->with('thong_bao', 'Thêm Giáo Viên thành công!');

    }
    public function danhSachGiaoVien()
    {
        $giaoviens = GiaoVien::all();
        $khoas = KhoaDaoTao::all();
        return view('giao_vien.danh-sach-giao-vien', compact('giaoviens','khoas'));

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

            
            $email = $row[0];

            // Kiểm tra tồn tại email
            if (GiaoVien::where('email', $email)->exists()) {
                $errors[] = "{$email}";
                $existingCount++;
                continue;
            }

            // Kiểm tra và chuyển đổi ngày tháng từ chuỗi thành ngày tháng
            try {
                $ngay_sinh = Carbon::createFromFormat('d/m/Y', $row[2])->format('Y-m-d');
            } catch (\Exception $e) {
                $errors[] = "Ngày sinh không hợp lệ cho {$email}.";
                continue;
            }

            try {
                GiaoVien::create([
              
                    'ho_ten' => $row[1],
                    'ngay_sinh' => $ngay_sinh,
                    'dia_chi' => $row[3],
                    'so_cccd' => $row[4],
                    'email' => $email,
                    'so_dien_thoai' => $row[5],
                    'khoa_id'=>$row[6],
                    'mat_khau' => Hash::make($row[4]), // Hash mật khẩu từ số cccd
                ]);
                $successCount++;
            } catch (\Exception $e) {
                $errors[] = "Lỗi khi thêm giao viên với {$email}: " . $e->getMessage();
            }
        }
        // Tạo thông báo tổng hợp
        $message = '';
        if ($successCount > 0) {
            $message .= "Thêm {$successCount} giáo viên thành công.";
        }
        if ($existingCount > 0) {
            $message .= "{$existingCount} giáo viên đã tồn tại.";
        }
        if (count($errors) > 0) {
            $message .= " Lỗi với " . count($errors) . " giáo viên: " . implode(", ", $errors);
        }

        return redirect()->route('giao_vien.danh_sach')->with('thong_bao', $message);
    }
    public function sua($email)
    {
        $giao_vien = GiaoVien::find($email);
        $khoas = KhoaDaoTao::all();
        return view('giao_vien.sua', compact('giao_vien', 'khoas'));
    }

    public function xuLySua(GiaoVienRequest $request, $email)
    {

        $giao_vien = GiaoVien::find($email);
        if ($giao_vien) {
            $giao_vien->email = $request->input('email');
            $giao_vien->ho_ten = $request->input('ho_ten');
            $giao_vien->khoa_id = $request->input('khoa_id');
            $giao_vien->ngay_sinh = $request->input('ngay_sinh');
            $giao_vien->so_dien_thoai = $request->input('so_dien_thoai');
            $giao_vien->so_cccd = $request->input('so_cccd');
            $giao_vien->dia_chi = $request->input('dia_chi');

            $giao_vien->save();

            return redirect()->route('giao_vien.danh_sach')->with('thong_bao', 'Cập nhật thành công!');
        }

        return redirect()->back()->with('error', 'Giáo viên không tồn tại.');
    }


    public function xoa($email)
    {
        $giao_vien = GiaoVien::find($email);
        if ($giao_vien) {
            $giao_vien->delete();
            return redirect()->route('giao_vien.danh_sach')->with('thong_bao', 'Xóa thành công!');
        }
        return redirect()->route('giao_vien.danh_sach')->with('error', 'Giáo viên không tồn tại.');
    }
    public function khoiPhuc($email)
        {
            // Tìm giáo viên bao gồm cả những giáo viên đã bị xóa mềm
            $giao_vien = GiaoVien::withTrashed()->find($email);

            // Kiểm tra nếu giáo viên tồn tại và đã bị xóa mềm
            if ($giao_vien && $giao_vien->trashed()) {
                // Khôi phục tài khoản giáo viên
                $giao_vien->restore();
                return redirect()->route('giao_vien.danh_sach')->with('thong_bao', 'Khôi phục thành công!');
            }

            return redirect()->route('giao_vien.danh_sach')->with('error', 'Giáo viên không tồn tại hoặc chưa bị xóa.');
        }
        public function danhSachGiaoVienDaXoa()
        {
            // Lấy danh sách giáo viên đã bị xóa mềm
            $giaoviens = GiaoVien::onlyTrashed()->paginate(5);
            return view('giao_vien.danh-sach-da-xoa', compact('giaoviens'));
        }

        
            
        }