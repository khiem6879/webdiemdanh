<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiemDanhNgoai;
use App\Models\GiaoVien;
use App\Models\KhoaDaoTao;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use SimpleSoftwareIO\QrCode\Generator;
use Illuminate\Support\Str;

class DiemDanhNgoaiController extends Controller
{
    public function danhSach()
    {
        $diemdanhngoais = DiemDanhNgoai::with('giaoVien')->paginate(10);
        return view('diem_danh_ngoai.danh-sach', compact('diemdanhngoais'));
    }

    public function them(Request $request)
    {
        $giaoviens = GiaoVien::all();
        $khoas = KhoaDaoTao::all();
        $uniqueMaLop = generateUniqueMaLop();
        $expirationTime = now()->addMinutes($request->thoi_gian_qr);
        $initialTimeInMinutes = $request->thoi_gian_qr;
        
        return view('diem_danh_ngoai.them', compact('giaoviens','khoas','uniqueMaLop','expirationTime','initialTimeInMinutes'));
 
    }
    public function fetchGiaoViensByKhoa(Request $request)
    {
        $khoaId = $request->khoa_id;
        $uniqueMaLop = generateUniqueMaLop();
        $giaoviens = GiaoVien::where('khoa_id', $khoaId)->get();
        return response()->json($giaoviens);
    }

    public function xuLyThem(Request $request)
    {
        $request->validate([
            'ma_diem_danh' => 'required|string|max:255',
            'giao_vien_email' => 'required|email',
           'thoi_gian_qr' => 'required|integer|min:1',
            'ngay' => 'required|date',
            'so_luong' => 'required|integer',
        ]);
        $expirationTime = now()->addMinutes($request->thoi_gian_qr);

        // Generate QR code and save to storage using GD extension
        $qrCodeData = route('sinh_vien.trang_chu');
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($qrCodeData)
            ->size(200)
            ->build();
            

        // Lưu hình ảnh mã QR vào storage
        $fileName =  '.png';
        Storage::put('public/qr_codes/' . $fileName, $result->getString());

        $diemdanhngoai = new DiemDanhNgoai();
        $diemdanhngoai->ma_diem_danh =generateUniqueMaLop();
        $diemdanhngoai->ma_qr = $fileName;
        $diemdanhngoai->giao_vien_email = $request->giao_vien_email;
        $diemdanhngoai->thoi_gian_qr = now()->addMinutes($request->thoi_gian_qr);
        $diemdanhngoai->ngay = $request->ngay;
        $diemdanhngoai->so_luong = $request->so_luong;
        $diemdanhngoai->save();


        

        return redirect()->route('diem-danh-ngoai.danh_sach');
    }


    public function chiTiet($maDiemDanh)
{
    $diemDanhNgoai = DiemDanhNgoai::with('giaoVien')->where('ma_diem_danh', $maDiemDanh)->first();
    if ($diemDanhNgoai) {
        return view('diem_danh_ngoai.chi-tiet', compact('diemDanhNgoai'));
    }
    return redirect()->route('diem-danh-ngoai.danh_sach')->with('error', 'Không tìm thấy dữ liệu');
}
    
    public function xoa($ma_diem_danh)
    {
        $diemdanhngoai = DiemDanhNgoai::findOrFail($ma_diem_danh);
        $diemdanhngoai->delete();

        return redirect()->route('diem-danh-ngoai.danh_sach')->with('success', 'Đã xóa thành công');
    }
}
