<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiemDanhNgoai;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DiemDanhNgoaiController extends Controller
{
    public function danhSach()
    {
        $diemdanhngoais = DiemDanhNgoai::paginate(10);
        return view('diem_danh_ngoai.danh-sach', compact('diemdanhngoais'));
    }

    public function Them()
    {
        return view('diem_danh_ngoai.them');
    }

    public function xuLyThem(Request $request)
    {
        $request->validate([
            'ma_diem_danh' => 'required|string|max:255',
            'giao_vien_email' => 'required|email',
            'thoi_gian_qr' => 'required|date_format:Y-m-d\TH:i',
            'ngay' => 'required|date',
            'so_luong' => 'required|integer',
        ]);

        $maDiemDanh = $request->ma_diem_danh;

        // Generate QR code
        $qrCode = QrCode::format('png')->size(200)->generate($maDiemDanh);
        $qrCodeBase64 = base64_encode($qrCode);

        $diemdanhngoai = new DiemDanhNgoai();
        $diemdanhngoai->ma_diem_danh = $maDiemDanh;
        $diemdanhngoai->ma_qr = $qrCodeBase64;
        $diemdanhngoai->giao_vien_email = $request->giao_vien_email;
        $diemdanhngoai->thoi_gian_qr = $request->thoi_gian_qr;
        $diemdanhngoai->ngay = $request->ngay;
        $diemdanhngoai->so_luong = $request->so_luong;
        $diemdanhngoai->save();

        return redirect()->route('diem-danh-ngoai.danh_sach');
    }
}
