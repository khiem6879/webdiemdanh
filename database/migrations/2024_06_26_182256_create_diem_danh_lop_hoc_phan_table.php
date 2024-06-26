<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diem_danh_lop_hoc_phan', function (Blueprint $table) {
            $table->string('ma_diem_danh', 10)->primary();
            $table->string('ma_qr');
            $table->string('ma_lop', 10);
            $table->dateTime('thoi_gian_qr');
            $table->date('ngay');
            $table->timestamps();

            $table->foreign('ma_lop')->references('ma_lop')->on('lop_hoc_phan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diem_danh_lop_hoc_phan');
    }
};
