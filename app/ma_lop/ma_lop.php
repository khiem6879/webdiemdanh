<?php

use Illuminate\Support\Str;
use App\Models\LopHocPhan;
use App\Models\LopSinhVien;
use App\Models\MonHoc;


if (! function_exists('generateUniqueMaLop')) {
    function generateUniqueMaLop() {
        do {
            // Sinh mã ngẫu nhiên dài 7 ký tự
            $maLop = Str::random(7);
        } while (
            LopHocPhan::where('ma_lop', $maLop)->exists() ||
            LopSinhVien::where('ma_lop', $maLop)->exists() ||
            MonHoc::where('ma_mon',$maLop)->exists()
        );

        return $maLop;
    }
}
