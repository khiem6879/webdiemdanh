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
        Schema::create('lop_hoc_phan', function (Blueprint $table) {
        $table->string('ma_lop', 10)->primary();
        $table->string('ten_lop', 40);
        $table->json('giao_vien_email')->nullable(); // Cột JSON để lưu danh sách email giáo viên
        $table->json('sinh_vien_mssv')->nullable(); // Cột JSON để lưu danh sách mã sinh viên
        $table->integer('khoa_id')->unsigned();
        $table->string('ma_mon', 20);
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('khoa_id')->references('khoa_id')->on('khoa_dao_tao');
        $table->foreign('ma_mon')->references('ma_mon')->on('mon_hoc')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lop_hoc_phan');
    }
};
