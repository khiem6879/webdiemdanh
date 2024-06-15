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
        SinhVien::create([
            'ma_sinh_vien' => '0306',
            'ho_ten'=>'kkk',
            'ngay_sinh'=>'10/22/2003',    
            'dia_chi'=>'hcm',
            'so_cccd'=>'1233333',
            'so_dien_thoai'=>'111111',
            'email' => 'sv1',
            'mat_khau' => Hash::make('123'), // Đảm bảo mật khẩu được mã hóa
        ]);
    }
}
