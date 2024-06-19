use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    
    
    public function up(): void
    {
        // Xóa bảng nếu tồn tại
        Schema::dropIfExists('diem_danh_ngoai');
        
        Schema::create('diem_danh_ngoai', function (Blueprint $table) {
            $table->string('ma_diem_danh', 10)->primary();
            $table->string('ma_qr')->nullable();
            $table->string('giao_vien_email', 30);
            $table->dateTime('thoi_gian_qr')->nullable();
            $table->date('ngay')->nullable();
            $table->integer('so_luong')->nullable();
            $table->timestamps();

            // Thiết lập khóa ngoại
            $table->foreign('giao_vien_email')->references('email')->on('giao_vien');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('diem_danh_ngoai');
    }
};
