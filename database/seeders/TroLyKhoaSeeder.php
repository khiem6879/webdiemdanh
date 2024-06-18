<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TroLyKhoa;
use Illuminate\Support\Facades\Hash;
class TroLyKhoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        TroLyKhoa::create([
            'email' => 'tl2',
            'ho_ten' => 'kkkkkkk',
            'mat_khau' => Hash::make('123'), 
            'khoa_id' => '1',
            'sdt' => 'tl1',
            'thoi_gian_dang_nhap_cuoi' => 'tl1',
            'avt' => 'kkkkkkkk',
            // Đảm bảo mật khẩu được mã hóa
        ]);
    }
}
