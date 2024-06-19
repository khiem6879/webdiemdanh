<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GiaoVien;
use Illuminate\Support\Facades\Hash;
class GiaoVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            ['name' => 'gv1', 'khoa_id' => 1],
            ['name' => 'gv2', 'khoa_id' => 1],
            ['name' => 'gv3', 'khoa_id' => 1],
            ['name' => 'gv4', 'khoa_id' => 1],
            ['name' => 'gv5', 'khoa_id' => 1],
            ['name' => 'gv6', 'khoa_id' => 2],
            ['name' => 'gv7', 'khoa_id' => 2],
            ['name' => 'gv8', 'khoa_id' => 2],
            ['name' => 'gv9', 'khoa_id' => 2],
            ['name' => 'gv10', 'khoa_id' => 2],
            ['name' => 'gv11', 'khoa_id' => 2],
            ['name' => 'gv12', 'khoa_id' => 3],
            ['name' => 'gv13', 'khoa_id' => 3],
            ['name' => 'gv14', 'khoa_id' => 3],
            ['name' => 'gv15', 'khoa_id' => 3],
            ['name' => 'gv16', 'khoa_id' => 3],
            ['name' => 'gv17', 'khoa_id' => 3],
        ];

        foreach ($teachers as $teacherData) {
            $ho_ten = $teacherData['name'];
            $ngay_sinh = '2003-10-22';
            $dia_chi = 'hcm';
            $cccd = '1233333';
            $so_dien_thoai = '111111';
            $email = $teacherData['name'] . '@gmail.com';
            $mat_khau = Hash::make('123');
            $khoa_id = $teacherData['khoa_id'];

            GiaoVien::create([
                'ho_ten' => $ho_ten,
                'ngay_sinh' => $ngay_sinh,
                'dia_chi' => $dia_chi,
                'cccd' => $cccd,
                'so_dien_thoai' => $so_dien_thoai,
                'email' => $email,
                'mat_khau' => $mat_khau,
                'khoa_id' => $khoa_id,
            ]);
        }
    }
}
