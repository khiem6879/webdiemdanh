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
            'email' => 'tl1',
            'mat_khau' => Hash::make('123'), // Đảm bảo mật khẩu được mã hóa
        ]);
    }
}
