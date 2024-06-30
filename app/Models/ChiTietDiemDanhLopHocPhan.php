<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDiemDanhLopHocPhan extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_diem_danh_lop_hoc_phan';

    // Thiết lập khóa chính phức hợp
    protected $primaryKey = ['ma_diem_danh', 'ma_sinh_vien'];

    // Sử dụng các trường không tự động tăng
    public $incrementing = false;

    // Kiểu dữ liệu của khóa chính là chuỗi
    protected $keyType = 'string';

    protected $fillable = [
        'ma_diem_danh',
        'ma_sinh_vien',
        'trang_thai',
        'thoi_gian',
        'vi_tri',
        'created_at',
        'updated_at',
    ];

    public function sinhVien()
    {
        return $this->belongsTo(SinhVien::class, 'ma_sinh_vien', 'ma_sinh_vien');
    }
    // Override phương thức để xử lý khóa chính phức hợp
    public function setKeysForSaveQuery($query)
    {
        // Lấy các khóa chính của model
        $keys = $this->getKeyName();
        
        // Nếu không phải là mảng (chỉ có một khóa chính)
        if (!is_array($keys)) {
            // Gọi phương thức gốc của lớp cha
            return parent::setKeysForSaveQuery($query);
        }
    
        // Nếu là mảng (có nhiều khóa chính)
        foreach ($keys as $keyName) {
            // Thêm điều kiện where cho từng khóa chính
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }
    
        // Trả về truy vấn đã thiết lập
        return $query;
    }
    

    protected function getKeyForSaveQuery($keyName = null)
    {
        // Nếu $keyName là null, lấy tên khóa chính
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
        }
    
        // Trả về giá trị của khóa chính từ mảng original hoặc thuộc tính của model
        return $this->original[$keyName] ?? $this->getAttribute($keyName);
    }
}
