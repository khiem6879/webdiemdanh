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
        Schema::create('sinh_vien', function (Blueprint $table) {
           // Sử dụng ma_sinh_vien làm khóa chính
           $table->string('ma_sinh_vien', 20)->primary();
           $table->string('ho_ten', 50);
           $table->date('ngay_sinh');
           $table->string('dia_chi', 300);
           $table->string('so_cccd', 12);
           $table->string('email', 50)->unique();
           $table->string('mat_khau', 255);
           $table->string('so_dien_thoai', 11)->unique();
           $table->timestamps();
           $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinh_vien');
    }
};
