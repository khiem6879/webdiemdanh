<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\SinhVien;
use Illuminate\Support\Facades\Hash;

class SinhVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $ma_sinh_vien = sprintf('%04d', $i); // Định dạng ID sinh viên thành số 4 chữ số với số 0 đứng đầu
            $ho_ten = 'sv' . $i; // Tạo tên sinh viên dạng sv1, sv2, ..., sv10
            $ngay_sinh = '2003-10-22'; // Giả định định dạng ngày YYYY-MM-DD cho đồng nhất
            $dia_chi = 'hcm'; // Giả định địa chỉ cho tất cả sinh viên để đơn giản
            $so_cccd = '1233333'; // Giả định số CCCD cho tất cả sinh viên để đơn giản
            $so_dien_thoai = '111111'; // Giả định số điện thoại cho tất cả sinh viên để đơn giản
            $email = 'sv' . $i . '@gmail.com';
            $mat_khau = Hash::make('123'); // Mã hóa mật khẩu, giả định '123' cho tất cả sinh viên

            SinhVien::create([
                'ma_sinh_vien' => $ma_sinh_vien,
                'ho_ten' => $ho_ten,
                'ngay_sinh' => $ngay_sinh,
                'dia_chi' => $dia_chi,
                'so_cccd' => $so_cccd,
                'so_dien_thoai' => $so_dien_thoai,
                'email' => $email,
                'mat_khau' => $mat_khau,
            ]);
        }
    }

}
