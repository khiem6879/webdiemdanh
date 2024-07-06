<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhoaDaoTaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('khoa_dao_tao')->insert([
            [
                'khoa_id' => '1',
                'ten_khoa' => 'Cơ Khí',
            ],
            [
                'khoa_id' => '2',
                'ten_khoa' => 'Công Nghệ Thông Tin',
            ],
            [
                'khoa_id' => '3',
                'ten_khoa' => 'Cơ Khí Động Lực',
            ],
            [
                'khoa_id' => '4',
                'ten_khoa' => 'Điện - Điện Tử',
            ],
            [
                'khoa_id' => '5',
                'ten_khoa' => 'Công Nghệ Nhiệt Lạnh',
            ],
            [
                'khoa_id' => '6',
                'ten_khoa' => 'Giáo Dục Đại Cương',
            ],
            [
                'khoa_id' => '7',
                'ten_khoa' => 'Bộ Môn Kinh Tế',
            ],

        ]);
    }
}
