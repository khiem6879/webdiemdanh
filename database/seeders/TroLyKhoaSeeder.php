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
        $troLyKhoas = [
            [
                'email' => 'tl1@gmail.com',
                'ho_ten' => 'TroLyKhoa1',
                'mat_khau' => Hash::make('123'),
                'khoa_id' => '1',
                'so_dien_thoai' => '1111111111',
                'thoi_gian_dang_nhap_cuoi' => now(),
                'avt' => 'avt1.png',
            ],
            [
                'email' => 'tl2@gmail.com',
                'ho_ten' => 'TroLyKhoa2',
                'mat_khau' => Hash::make('123'),
                'khoa_id' => '2',
                'so_dien_thoai' => '2222222222',
                'thoi_gian_dang_nhap_cuoi' => now(),
                'avt' => 'avt2.png',
            ],
            [
                'email' => 'tl3@gmail.com',
                'ho_ten' => 'TroLyKhoa3',
                'mat_khau' => Hash::make('123'),
                'khoa_id' => '3',
                'so_dien_thoai' => '3333333333',
                'thoi_gian_dang_nhap_cuoi' => now(),
                'avt' => 'avt3.png',
            ],
            [
                'email' => 'tl4@gmail.com',
                'ho_ten' => 'TroLyKhoa4',
                'mat_khau' => Hash::make('123'),
                'khoa_id' => '4',
                'so_dien_thoai' => '4444444444',
                'thoi_gian_dang_nhap_cuoi' => now(),
                'avt' => 'avt4.png',
            ],
        ];

        foreach ($troLyKhoas as $troLyKhoa) {
            TroLyKhoa::create($troLyKhoa);
        }
    }
}
