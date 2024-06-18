<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KhoaDaoTao;
class KhoaDaoTaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KhoaDaoTao::create([

            'khoa_id'=>'1',
            'ten_khoa'=>'CNTT',
        ]);

    }
}
