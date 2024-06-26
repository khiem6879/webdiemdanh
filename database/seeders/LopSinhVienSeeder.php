<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LopSinhVien;
use App\Models\LopHocPhan;
class LopSinhVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        LopHocPhan::create([
            'ma_lop' => '11313',
            'ten_lop' => 'cdth',
            'giao_vien_email' => json_encode(['gv1@gmail.com', 'gv2@gmail.com','gv3@gmail.com', 'gv3@gmail.com']),
            'sinh_vien_mssv' => json_encode(['0001', '0002','0003', '0004']), // Giá trị sinh viên phải tồn tại trong bảng sinh_vien
            'khoa_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
