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
        Schema::create('giao_vien', function (Blueprint $table) {
            $table->string('email', 30)->primary();
            $table->string('ho_ten', 40);
            $table->date('ngay_sinh');
            $table->string('mat_khau', 255);
            $table->string('so_dien_thoai', 11);
            $table->string('so_cccd', 12)->nullable(false);
            $table->string('dia_chi', 300);
            $table->unsignedInteger('khoa_id'); 
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('khoa_id')->references('khoa_id')->on('khoa_dao_tao')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giao_vien');
    }
};
