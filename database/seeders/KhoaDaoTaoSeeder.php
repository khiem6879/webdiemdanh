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
                'ten_khoa' => 'CNTT',
            ],
            [
                'khoa_id' => '2',
                'ten_khoa' => 'Oto',
            ],
            [
                'khoa_id' => '3',
                'ten_khoa' => 'Co',
            ],
            [
                'khoa_id' => '4',
                'ten_khoa' => 'Dien',
            ],
        ]);
    }
}
