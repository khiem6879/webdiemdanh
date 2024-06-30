<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DiemDanhLopHocPhan;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\LopHocPhan;
use App\Models\ChiTietDiemDanhLopHocPhan;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class DiemDanhLopHocPhanController extends Controller
{
    public function diemDanh($maLop)
    {
        $lopHocPhan = LopHocPhan::where('ma_lop', $maLop)->firstOrFail();
        $maDiemDanh = generateUniqueMaLop(); // Tạo mã điểm danh duy nhất
        $thoiGianQr = 10; // Thời gian tồn tại QR (10 phút)
        $ngay = now()->setTimezone('Asia/Ho_Chi_Minh')->toDateString(); // Ngày điểm danh theo giờ Việt Nam


        // Tạo mã QR
        $qrCodeData = route('sinh_vien.diem_danh_qr', ['maDiemDanh' => $maDiemDanh]);
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($qrCodeData)
            ->size(200)
            ->margin(10)
            ->build();

        // Lưu hình ảnh mã QR vào storage
        $fileName = $maDiemDanh . '.png';
        Storage::put('public/qr_codes/' . $fileName, $result->getString());

        // Lưu thông tin điểm danh vào cơ sở dữ liệu
        DiemDanhLopHocPhan::create([
            'ma_diem_danh' => $maDiemDanh,
            'ma_qr' => $fileName,
            'ma_lop' => $maLop,
            'thoi_gian_qr' => now()->addMinutes($thoiGianQr),
            'ngay' => $ngay
        ]);

        // Thêm tất cả sinh viên có mã sinh viên tồn tại trong sinh_vien_mssv của bảng lop_hoc_phan
        $maSinhViens = json_decode($lopHocPhan->sinh_vien_mssv);
        foreach ($maSinhViens as $maSinhVien) {
            ChiTietDiemDanhLopHocPhan::create([
                'ma_diem_danh' => $maDiemDanh,
                'ma_sinh_vien' => $maSinhVien,
                'trang_thai' => 'Chưa điểm danh',
                'thoi_gian' => null,
                'vi_tri' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('lop_hoc_phan.danh_sach_diem_danh')->with('thong_bao', 'Tạo điểm danh thành công.');
    }

    public function danhSachDiemDanh()
    {
        $diemDanhs = DiemDanhLopHocPhan::orderBy('created_at', 'desc')->paginate(10);
        return view('lop_hoc_phan.danh-sach-diem-danh', compact('diemDanhs'));
    }
    public function chinhSuaThoiGian(Request $request)
    {
        $diemDanh = DiemDanhLopHocPhan::where('ma_diem_danh', $request->ma_diem_danh)->firstOrFail();
        $thoiGianMoi = $request->thoi_gian_qr; // Lấy số phút mới từ request

        if ($thoiGianMoi <= 0) {
            return redirect()->route('lop_hoc_phan.danh_sach_diem_danh')->with('thong_bao', 'Thời gian phải lớn hơn 0.');
        }

        $diemDanh->thoi_gian_qr = now()->setTimezone('Asia/Ho_Chi_Minh')->addMinutes($thoiGianMoi);
        $diemDanh->save();

        return redirect()->route('lop_hoc_phan.danh_sach_diem_danh')->with('thong_bao', 'Thời gian mã QR đã được cập nhật.');
    }

    public function chiTietDiemDanh($maDiemDanh)
    {
        $chiTietDiemDanhs = ChiTietDiemDanhLopHocPhan::where('ma_diem_danh', $maDiemDanh)->get();
        return view('lop_hoc_phan.chi-tiet-diem-danh', compact('chiTietDiemDanhs'));
    }

    public function xacNhanDiemDanh(Request $request, $maDiemDanh)
    {

        // dd($request);
        // Ép kiểu biến $maDiemDanh thành chuỗi để đảm bảo kiểu dữ liệu
        $maDiemDanh = (string) $maDiemDanh;
        // Ép kiểu biến $maSinhVien thành chuỗi để đảm bảo kiểu dữ liệu
        $maSinhVien = (string) $request->ma_sinh_vien;
    

        $diemDanh = DiemDanhLopHocPhan::where('ma_diem_danh', $maDiemDanh)->firstOrFail();
        $lopHocPhan = LopHocPhan::where('ma_lop', $diemDanh->ma_lop)->firstOrFail();
    
        // Kiểm tra mã sinh viên có tồn tại trong lớp học phần hay không
        $maSinhViens = json_decode($lopHocPhan->sinh_vien_mssv, true);
        if (!in_array($maSinhVien, $maSinhViens)) {
            return redirect()->back()->with('thong_bao', 'Sinh viên không thuộc lớp học phần này');
        }
    
        if (Carbon::now()->greaterThan($diemDanh->thoi_gian_qr)) {
            return redirect()->back()->with('thong_bao', 'Mã điểm danh đã hết hạn');
        }
    
        // Sử dụng where cho từng khóa chính
        $chiTietDiemDanh = ChiTietDiemDanhLopHocPhan::where([
            ['ma_diem_danh', '=', $maDiemDanh],
            ['ma_sinh_vien', '=', $maSinhVien]
        ])->first();
    
        if (!$chiTietDiemDanh) {
            return redirect()->back()->with('thong_bao', 'Không tìm thấy chi tiết điểm danh cho sinh viên này');
        }
    
        if ($chiTietDiemDanh->trang_thai == 'Đã điểm danh') {
            return redirect()->back()->with('thong_bao', 'Bạn đã điểm danh rồi');
        }
    
        // Cập nhật trạng thái, thời gian và vị trí
        $chiTietDiemDanh->trang_thai = 'Đã điểm danh';
        $chiTietDiemDanh->thoi_gian = now();
        $chiTietDiemDanh->vi_tri = $request->vi_tri;
        $chiTietDiemDanh->save();
    
        return redirect()->back()->with('thong_bao', 'Điểm danh thành công');
    }
    

    
    public function diemDanhQr($maDiemDanh)
    {
       
        $diemDanh = DiemDanhLopHocPhan::where('ma_diem_danh', $maDiemDanh)->firstOrFail();
        $maSinhVien = auth()->user()->ma_sinh_vien; // Lấy mã số sinh viên từ auth
        // dd($maSinhVien);
        return view('sinh_vien.diem-danh', compact('diemDanh', 'maSinhVien'));

    }

}
