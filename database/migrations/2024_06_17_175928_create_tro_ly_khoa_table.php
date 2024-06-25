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
        Schema::create('tro_ly_khoa', function (Blueprint $table) {
            $table->string('email', 50)->primary();
            $table->integer('khoa_id')->unsigned();
            $table->string('ho_ten', 40);
            $table->string('mat_khau', 255);
            $table->string('so_dien_thoai', 11);
            $table->string('thoi_gian_dang_nhap_cuoi');
            $table->string('avt')->default('default-avatar.png'); 
            $table->timestamps();
        
            $table->foreign('khoa_id')->references('khoa_id')->on('khoa_dao_tao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tro_ly_khoa');
    }
};
