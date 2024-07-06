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
        Schema::create('mon_hoc', function (Blueprint $table) {
            $table->string('ma_mon', 20)->primary();
            $table->string('ten_mon', 50);
            $table->unsignedInteger('khoa_id'); // Ensure this column is defined before setting the foreign key
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
        Schema::dropIfExists('mon_hoc');
    }
};
