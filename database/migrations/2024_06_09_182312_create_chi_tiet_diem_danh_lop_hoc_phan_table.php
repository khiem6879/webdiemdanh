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
            $table->string('ma_sinh_vien', 11);
            $table->string('trang_thai', 50);
            $table->dateTime('thoi_gian')->nullable();
            $table->string('vi_tri', 50)->nullable();
            $table->timestamps();

            // Thiết lập khóa chính kết hợp
            $table->primary(['ma_diem_danh', 'ma_sinh_vien']);

            // Thiết lập khóa ngoại
            $table->foreign('ma_sinh_vien')->references('ma_sinh_vien')->on('sinh_vien')->onDelete('cascade');
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
