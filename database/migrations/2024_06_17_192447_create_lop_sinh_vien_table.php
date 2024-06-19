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
        Schema::create('lop_sinh_vien', function (Blueprint $table) {
            $table->string('ma_lop', 10)->primary();
            $table->string('ten_lop', 20);
            $table->string('giao_vien_email', 20);
            $table->json('sinh_vien_mssv')->nullable(); // Cột JSON để lưu danh sách mã sinh viên
            $table->integer('khoa_id')->unsigned();
            $table->timestamps();
            $table->foreign('khoa_id')->references('khoa_id')->on('khoa_dao_tao');
            $table->foreign('giao_vien_email')->references('email')->on('giao_vien');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lop_sinh_vien');
    }
};
