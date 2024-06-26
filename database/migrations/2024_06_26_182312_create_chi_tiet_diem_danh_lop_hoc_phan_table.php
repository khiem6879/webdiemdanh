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
        Schema::create('chi_tiet_diem_danh_lop_hoc_phan', function (Blueprint $table) {
            $table->string('ma_diem_danh', 10);
            $table->json('sinh_vien_mssv')->nullable(); // Cột JSON để lưu danh sách mã sinh viên
            $table->string('trang_thai', 10);
            $table->dateTime('thoi_gian');
            $table->string('vi_tri', 50);
            $table->timestamps();


            $table->foreign('ma_diem_danh')->references('ma_diem_danh')->on('diem_danh_lop_hoc_phan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_diem_danh_lop_hoc_phan');
    }
};
