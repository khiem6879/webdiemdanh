<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\GiaoVienController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TroLyKhoaController;
use App\Http\Controllers\LopHocPhanController;
use App\Http\Controllers\LopSinhVienController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\DiemDanhLopHocPhanController;
use App\Http\Controllers\KhoaDaoTaoController;
use App\Http\Controllers\DiemDanhNgoaiController;
use App\Http\Controllers\MonHocController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('tai_khoan.dang-nhap');
});

Route::get('/Dang-Ky', [TaiKhoanController::class, 'dangKy'])->name('DangKy');
Route::post('/Dang-Ky', [TaiKhoanController::class, 'xulyDangKy'])->name('xu_ly_dang_ky');
Route::get('/xu-ly-chon-vai-tro', [TaiKhoanController::class, 'xuLyChonVaiTro'])->name('XuLyChonVaiTro');

Route::get('/DangNhap', [TaiKhoanController::class, 'dangNhap'])->name('DangNhap');
Route::post('/xulyDangNhap', [TaiKhoanController::class, 'xulyDangNhap'])->name('XuLyDangNhap');
Route::get('/tai-khoan-thong-tin', [TaiKhoanController::class, 'thongtinTaiKhoan'])->name('tai_khoan.thong-tin-tai-khoan');

Route::get('/Dangxuat', [TaiKhoanController::class, 'dangXuat'])->name('DangXuat');
Route::get('/tai-khoan/doi-mat-khau', [TaiKhoanController::class, 'hienThiDoiMatKhau'])->name('tai_khoan.doi_mat_khau');
Route::post('/tai-khoan/doi-mat-khau', [TaiKhoanController::class, 'doiMatKhau'])->name('tai_khoan.cap_nhat_mat_khau');

Route::post('/tai-khoan/xac-nhan-ma', [TaiKhoanController::class, 'xacNhanMa'])->name('tai_khoan.xac_nhan_ma');


Route::get('/taikhoan/sua', [TaiKhoanController::class, 'suaTaiKhoan'])->name('tai_khoan.sua');
Route::post('/taikhoan/xulysua', [TaiKhoanController::class, 'xulysuaTaiKhoan'])->name('tai_khoan.xu_ly_sua');

Route::middleware(['auth:sinh_vien', 'checkRole:sinh_vien'])->group(function () {
    Route::get('/diem-danh/{maDiemDanh}', [DiemDanhLopHocPhanController::class, 'diemDanhQr'])->name('sinh_vien.diem_danh_qr');
    Route::get('/sinh-vien/trang-chu', [SinhVienController::class, 'trangChu'])->name('sinh_vien.trang_chu');
});

Route::middleware(['auth:giao_vien', 'checkRole:giao_vien'])->group(function () {
<<<<<<< HEAD
  
    Route::get('giao-vien/sinh-vien/danh-sach', [SinhVienController::class, 'danhSachSinhVien'])->name('sinh_vien.danh_sach');
    Route::get('/giao-vien/lop-sinh-vien/danh-sach', [LopSinhVienController::class, 'danhSach'])->name('giao_vien.lop_sinh_vien.danh_sach');
    Route::get('/giao-vien/trang-chu', [GiaoVienController::class, 'trangChu'])->name('giao_vien.trang_chu');
    Route::get('/giao-vien/lop-sinh-vien/them', [LopSinhVienController::class, 'themLopSinhVien'])->name('lop_sinh_vien.them');
    Route::post('/giao-vien/lop-sinh-vien/xu-ly-them', [LopSinhVienController::class, 'xulythemLopSinhVien'])->name('lop_sinh_vien.xu_ly_them');
    Route::get('/giao-vien/lop-sinh-vien/chi-tiet/{ma_lop}', [LopSinhVienController::class, 'chiTiet'])->name('lop_sinh_vien.chi_tiet');
    Route::get('/giao-vien/lop-hoc-phan/{ma_lop}/chi-tiet', [LopHocPhanController::class, 'chiTiet'])->name('lop_hoc_phan.chi_tiet');
    Route::post('lop-hoc-phan/chinh/sua', [DiemDanhLopHocPhanController::class, 'chinhSuaThoiGian'])->name('lop_hoc_phan.chinh_sua_thoi_gian');
    Route::get('lop-hoc-phan/diem-danh/{maLop}', [DiemDanhLopHocPhanController::class, 'diemDanh'])->name('lop_hoc_phan.diem_danh');
    Route::get('/giao-vien/lop-hoc-phan/diem-danh-danh-sach', [DiemDanhLopHocPhanController::class, 'danhSachDiemDanh'])->name('lop_hoc_phan.danh_sach_diem_danh');
    Route::get('/lop-hoc-phan/chi-tiet-diem-danh/{ma_diem_danh}', [DiemDanhLopHocPhanController::class, 'chiTietDiemDanh'])->name('lop_hoc_phan.chi_tiet_diem_danh');
    
=======
    Route::prefix('giao-vien')->group(function () {
        Route::get('/sinh-vien/danh-sach', [SinhVienController::class, 'danhSachSinhVien'])->name('sinh_vien.danh_sach');
        Route::get('/lop-sinh-vien/danh-sach', [LopSinhVienController::class, 'danhSach'])->name('lop_sinh_vien.danh_sach');
        Route::get('/trang-chu', [GiaoVienController::class, 'trangChu'])->name('trang_chu');
        Route::get('/lop-sinh-vien/them', [LopSinhVienController::class, 'themLopSinhVien'])->name('lop_sinh_vien.them');
        Route::post('/lop-sinh-vien/xu-ly-them', [LopSinhVienController::class, 'xulythemLopSinhVien'])->name('lop_sinh_vien.xu_ly_them');
        Route::get('/lop-sinh-vien/chi-tiet/{ma_lop}', [LopSinhVienController::class, 'chiTiet'])->name('lop_sinh_vien.chi_tiet');
        Route::get('/lop-hoc-phan/{ma_lop}/chi-tiet', [LopHocPhanController::class, 'chiTiet'])->name('lop_hoc_phan.chi_tiet');
        Route::get('/mon-hoc/danh-sach', [MonHocController::class, 'danhSach'])->name('mon_hoc.danh-sach');
        Route::post('/lop-hoc-phan/chinh/sua', [DiemDanhLopHocPhanController::class, 'chinhSuaThoiGian'])->name('lop_hoc_phan.chinh_sua_thoi_gian');
        Route::get('/lop-hoc-phan/diem-danh/{maLop}', [DiemDanhLopHocPhanController::class, 'diemDanh'])->name('lop_hoc_phan.diem_danh');
        Route::get('/lop-hoc-phan/diem-danh-danh-sach', [DiemDanhLopHocPhanController::class, 'danhSachDiemDanh'])->name('lop_hoc_phan.danh_sach_diem_danh');
        Route::get('/lop-hoc-phan/chi-tiet-diem-danh/{ma_diem_danh}', [DiemDanhLopHocPhanController::class, 'chiTietDiemDanh'])->name('lop_hoc_phan.chi_tiet_diem_danh');
    });
>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02
});
Route::get('khoa-dao-tao/danh-sach', [KhoaDaoTaoController::class, 'danhSach'])->name('khoa.danh_sach');
Route::get('khoa-dao-tao/them', [KhoaDaoTaoController::class, 'them'])->name('khoa.them');
Route::post('khoa-dao-tao/them', [KhoaDaoTaoController::class, 'xuLyThem'])->name('khoa.xu_ly_them');
Route::get('khoa-dao-tao/sua/{khoa_id}', [KhoaDaoTaoController::class, 'sua'])->name('khoa.sua');
Route::put('khoa-dao-tao/sua/{khoa_id}', [KhoaDaoTaoController::class, 'xuLySua'])->name('khoa.xu_ly_sua');
Route::delete('khoa-dao-tao/xoa/{khoa_id}', [KhoaDaoTaoController::class, 'xoa'])->name('khoa.xoa');
Route::get('khoa-dao-tao/danh-sach-da-xoa', [KhoaDaoTaoController::class, 'danhSachDaXoa'])->name('khoa.danh_sach_da_xoa');
Route::post('khoa-dao-tao/khoi-phuc/{khoa_id}', [KhoaDaoTaoController::class, 'khoiPhuc'])->name('khoa.khoi_phuc');

Route::middleware(['auth:tro_ly_khoa', 'checkRole:tro_ly_khoa'])->group(function () {
    Route::prefix('tro-ly-khoa')->group(function () {
        Route::get('/giao-vien/danh-sach', [GiaoVienController::class, 'danhSach'])->name('giao_vien.danh_sach');
        Route::get('/trang-chu', [TroLyKhoaController::class, 'trangChu'])->name('trang_chu');
        Route::get('/lop-hoc-phan/danh-sach', [LopHocPhanController::class, 'danhSach'])->name('lop_hoc_phan.danh_sach');
        Route::get('/lop-hoc-phan/{ma_lop}/chi-tiet', [LopHocPhanController::class, 'chiTiet'])->name('lop_hoc_phan.chi_tiet');
        Route::get('/lop-hoc-phan/them', [LopHocPhanController::class, 'themLopHocPhan'])->name('lop_hoc_phan.them');
        Route::post('/lop-hoc-phan/xu-ly-them', [LopHocPhanController::class, 'xulythemLopHocPhan'])->name('lop_hoc_phan.xu_ly_them');
    });
});

Route::middleware(['auth:admin', 'checkRole:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/trang-chu', [AdminController::class, 'trangChu'])->name('trang_chu');
        Route::get('/giao-vien/danh-sach', [GiaoVienController::class, 'danhSach'])->name('giao_vien.danh_sach');
        Route::get('/lop-sinh-vien/danh-sach', [LopSinhVienController::class, 'danhSach'])->name('lop_sinh_vien.danh_sach');
        Route::get('/sinh-vien/danh-sach', [SinhVienController::class, 'danhSachSinhVien'])->name('sinh_vien.danh_sach');
        Route::get('/giao-vien/trang-chu', [GiaoVienController::class, 'trangChu'])->name('giao_vien.trang_chu');
        Route::get('/giao-vien/them', [GiaoVienController::class, 'them'])->name('giao_vien.them');
        Route::post('/giao-vien/xu-ly-them', [GiaoVienController::class, 'xuLyThem'])->name('giao_vien.xu_ly_them');
        Route::get('/giao-vien/sua/{email}', [GiaoVienController::class, 'sua'])->name('giao_vien.sua');
        Route::put('/giao-vien/xu-ly-sua/{email}', [GiaoVienController::class, 'xuLySua'])->name('giao_vien.xu_ly_sua');
        Route::delete('/giao-vien/xoa/{email}', [GiaoVienController::class, 'xoa'])->name('giao_vien.xoa');

        Route::get('/lop-hoc-phan/danh-sach', [LopHocPhanController::class, 'danhSach'])->name('lop_hoc_phan.danh_sach');
        Route::get('/lop-hoc-phan/chi-tiet/{ma_lop}', [LopHocPhanController::class, 'chiTiet'])->name('lop_hoc_phan.chi_tiet');
        Route::get('/lop-hoc-phan/them', [LopHocPhanController::class, 'themLopHocPhan'])->name('lop_hoc_phan.them');
        Route::post('/lop-hoc-phan/xu-ly-them', [LopHocPhanController::class, 'xulythemLopHocPhan'])->name('lop_hoc_phan.xu_ly_them');
        Route::get('/lop-hoc-phan/chi-tiet-diem-danh/{ma_diem_danh}', [DiemDanhLopHocPhanController::class, 'chiTietDiemDanh'])->name('lop_hoc_phan.chi_tiet_diem_danh');
        Route::get('/lop-hoc-phan/diem-danh-danh-sach', [DiemDanhLopHocPhanController::class, 'danhSachDiemDanh'])->name('lop_hoc_phan.danh_sach_diem_danh');
       
       
        Route::get('/lop-sinh-vien/them', [LopSinhVienController::class, 'themLopSinhVien'])->name('lop_sinh_vien.them');



        Route::get('/sinh-vien/trangchu', [SinhVienController::class, 'trangChu'])->name('sinh_vien.trang_chu');
        Route::delete('/sinh-vien/xoa/{ma_sinh_vien}', [SinhVienController::class, 'xoa'])->name('sinh_vien.xoa');
        Route::get('/sinh-vien/them', [SinhVienController::class, 'themSinhVien'])->name('sinh_vien.them');
        Route::post('/sinh-vien/xu-ly-them', [SinhVienController::class, 'xuLyThem'])->name('sinh_vien.xu_ly_them');
        Route::get('/sinh-vien/sua/{ma_sinh_vien}', [SinhVienController::class, 'sua'])->name('sinh_vien.sua');
        Route::put('/sinh-vien/xu-ly-sua/{ma_sinh_vien}', [SinhVienController::class, 'xuLySua'])->name('sinh_vien.xu_ly_sua');
        Route::get('/sinh-vien/tim-kiem', [SinhVienController::class, 'timKiem'])->name('sinh_vien.tim_kiem');

        Route::get('/tro-ly-khoa/giao-vien/danh-sach', [TroLyKhoaController::class, 'danhSachGiaoVien'])->name('tro_ly_khoa.danh_sach_giao_vien');
        Route::get('/tro-ly-khoa/trang-chu', [TroLyKhoaController::class, 'trangChu'])->name('tro_ly_khoa.trang_chu');
        Route::get('/tro-ly-khoa/danh-sach', [TroLyKhoaController::class, 'danhSach'])->name('tro_ly_khoa.danh_sach');
        Route::get('/tro-ly-khoa/them', [TroLyKhoaController::class, 'them'])->name('tro_ly_khoa.them');
        Route::post('/tro-ly-khoa/xu-ly-them', [TroLyKhoaController::class, 'xuLyThem'])->name('tro_ly_khoa.xu_ly_them');
        Route::get('/tro-ly-khoa/sua/{email}', [TroLyKhoaController::class, 'sua'])->name('tro_ly_khoa.sua');
        Route::put('/tro-ly-khoa/xu-ly-sua/{email}', [TroLyKhoaController::class, 'xuLySua'])->name('tro_ly_khoa.xu_ly_sua');
        Route::delete('/tro-ly-khoa/xoa/{email}', [TroLyKhoaController::class, 'xoa'])->name('tro_ly_khoa.xoa');

        Route::get('/khoa-dao-tao/danh-sach', [KhoaDaoTaoController::class, 'danhSach'])->name('khoa_dao_tao.danh_sach');
    });
});

Route::get('/mon-hoc/danh-sach', [MonHocController::class, 'danhSach'])->name('mon_hoc.danh-sach');
Route::get('/mon-hoc/them', [MonHocController::class, 'them'])->name('mon_hoc.them');
Route::post('/mon-hoc/xu-ly-them', [MonHocController::class, 'xuLyThem'])->name('mon_hoc.xu_ly_them');
Route::get('/mon-hoc/sua/{ma_mon}', [MonHocController::class, 'sua'])->name('mon_hoc.sua');
Route::put('/mon-hoc/xu-ly-sua/{ma_mon}', [MonHocController::class, 'xuLySua'])->name('mon_hoc.xu_ly_sua');
Route::delete('/mon-hoc/xoa/{ma_mon}', [MonHocController::class, 'xoa'])->name('mon_hoc.xoa');
Route::get('/mon-hoc/da-xoa', [MonHocController::class, 'danhSachDaXoa'])->name('mon_hoc.danh_sach_da_xoa');
Route::get('/mon-hoc/khoi-phuc/{ma_mon}', [MonHocController::class, 'khoiPhuc'])->name('mon_hoc.khoi_phuc');


<<<<<<< HEAD



Route::middleware(['auth:admin', 'checkRole:admin'])->group(function () {
    Route::get('/admin/trang-chu', [AdminController::class, 'trangChu'])->name('admin.trang_chu');
    Route::get('/admin/giao-vien/danh-sach', [GiaoVienController::class, 'danhSach'])->name('giao_vien.danh_sach');
    Route::get('/admin/lop-sinh-vien/danh-sach', [LopSinhVienController::class, 'danhSach'])->name('lop_sinh_vien.danh_sach');
   
    Route::get('/admin/trang-chu', [AdminController::class, 'trangChu'])->name('admin.trang_chu');
    Route::get('/admin/lop-hoc-phan/danh-sach', [LopHocPhanController::class, 'danhSach'])->name('lop_hoc_phan.danh_sach');

    Route::get('/admin/sinhvien/trangchu', [SinhVienController::class, 'trangChu'])->name('admin.sinh_vien.trang_chu');
    Route::get('/admin/sinh-vien/danh-sach', [SinhVienController::class, 'danhSachSinhVien'])->name('sinh_vien.danh_sach');
    Route::get('/admin/sinh-vien/them', [SinhVienController::class, 'themSinhVien'])->name('sinh_vien.them');
    Route::post('/admin/sinh-vien/xu-ly-them', [SinhVienController::class, 'xuLyThem'])->name('sinh_vien.xu_ly_them');
    Route::get('/admin/sinh-vien/sua/{ma_sinh_vien}', [SinhVienController::class, 'sua'])->name('sinh_vien.sua');
    Route::put('/admin/sinh-vien/xu-ly-sua/{ma_sinh_vien}', [SinhVienController::class, 'xuLySua'])->name('sinh_vien.xu_ly_sua');
    Route::get('/admin/sinh-vien/tim-kiem', [SinhVienController::class, 'timKiem'])->name('sinh_vien.tim_kiem');
    Route::delete('/admin/sinh-vien/xoa/{ma_sinh_vien}', [SinhVienController::class, 'xoa'])->name('sinh_vien.xoa');
    Route::get('/admin/sinh-vien/da-xoa', [SinhVienController::class, 'danhSachDaXoa'])->name('sinh_vien.danh_sach_da_xoa');
    Route::get('/admin/sinh-vien/khoi-phuc/{ma_sinh_vien}', [SinhVienController::class, 'khoiPhuc'])->name('sinh_vien.khoi_phuc');




    Route::get('/admin/giao-vien/trang-chu', [GiaoVienController::class, 'trangChu'])->name('admin.giao_vien.trang_chu');
    Route::get('/admin/giao-vien/danh-sach', [GiaoVienController::class, 'danhSach'])->name('giao_vien.danh_sach');
    Route::get('/admin/giao-vien/them', [GiaoVienController::class, 'Them'])->name('giao_vien.them');
    Route::post('/admin/giao-vien/xu-ly-them', [GiaoVienController::class, 'xuLyThem'])->name('giao_vien.xu_ly_them');
    Route::get('/admin/giao-vien/sua/{email}', [GiaoVienController::class, 'sua'])->name('giao_vien.sua');
    Route::put('/admin/giao-vien/xu-ly-sua/{email}', [GiaoVienController::class, 'xuLySua'])->name('giao_vien.xu_ly_sua');
    Route::delete('/admin/giao-vien/xoa/{email}', [GiaoVienController::class, 'xoa'])->name('giao_vien.xoa');
    Route::get('/admin/giao-vien/khoi-phuc/{email}', [GiaoVienController::class, 'khoiPhuc'])->name('giao_vien.khoi_phuc');
    Route::get('/admin/giao-vien/da-xoa', [GiaoVienController::class, 'danhSachGiaoVienDaXoa'])->name('giao_vien.danh_sach_da_xoa');
    

    Route::get('/admin/tro-ly-khoa/giao-vien/danh-sach', [TroLyKhoaController::class, 'danhSachGiaoVien'])->name('tro_ly_khoa.danh_sach_giao_vien');
    Route::get('/admin/tro_ly_khoa/lop-hoc-phan/danh-sach', [LopHocPhanController::class, 'danhSach'])->name('lop_hoc_phan.danh_sach');
    Route::get('/admin/tro-ly-khoa/trang-chu', [TroLyKhoaController::class, 'trangChu'])->name('tro_ly_khoa.trang_chu');
    Route::get('/admin/tro-ly-khoa/danh-sach', [TroLyKhoaController::class, 'danhSach'])->name('tro_ly_khoa.danh_sach');
    Route::get('/tro-ly-khoa/them', [TroLyKhoaController::class, 'them'])->name('tro_ly_khoa.them');
    Route::post('/tro-ly-khoa/xu-ly-them', [TroLyKhoaController::class, 'xuLyThem'])->name('tro_ly_khoa.xu_ly_them');
    Route::get('/admin/tro-ly-khoa/sua/{email}', [TroLyKhoaController::class, 'sua'])->name('tro_ly_khoa.sua');
    Route::put('/admin/tro-ly-khoa/xu-ly-sua/{email}', [TroLyKhoaController::class, 'xuLySua'])->name('tro_ly_khoa.xu_ly_sua');
    Route::delete('/admin/tro-ly-khoa/xoa/{email}', [TroLyKhoaController::class, 'xoa'])->name('tro_ly_khoa.xoa');


    

});


Route::middleware(['auth:tro_ly_khoa', 'checkRole:tro_ly_khoa'])->group(function () {

    Route::get('/tro-ly-khoa/giao-vien/danh-sach', [GiaoVienController::class, 'danhSach'])->name('tro-ly-khoa.giao-vien.danh_sach');

    Route::get('/tro-ly-khoa/trang-chu', [TroLyKhoaController::class, 'trangChu'])->name('tro_ly_khoa.trang_chu');
    Route::get('/tro_ly_khoa/lop-hoc-phan/danh-sach', [LopHocPhanController::class, 'danhSach'])->name('tro_ly_khoa.lop_hoc_phan.danh_sach');


    Route::get('/lop-hoc-phan/{ma_lop}/chi-tiet', [LopHocPhanController::class, 'chiTiet'])->name('tro_ly_khoa_lop_hoc_phan.chi_tiet');
    Route::get('/tro_ly_khoa/lop-hoc-phan/them', [LopHocPhanController::class, 'themLopHocPhan'])->name('tro_ly_khoa.lop_hoc_phan.them');
    Route::post('/lop-hoc-phan/xu-ly-them', [LopHocPhanController::class, 'xulythemLopHocPhan'])->name('lop_hoc_phan.xu_ly_them');



});
Route::get('giao-vien/lop-hoc-phan/danh-sach', [LopHocPhanController::class, 'danhSach'])->name('lop_hoc_phan.danh_sach');
Route::get('/lop-hoc-phan/them', [LopHocPhanController::class, 'themLopHocPhan'])->name('lop_hoc_phan.them');
Route::post('/lop-hoc-phan/xu-ly-them', [LopHocPhanController::class, 'xulythemLopHocPhan'])->name('lop_hoc_phan.xu_ly_them');
Route::get('/lop-hoc-phan/danh-sach', [LopHocPhanController::class, 'danhSach'])->name('lop_hoc_phan.danh_sach');

Route::get('/khoa/danh-sach', [KhoaDaoTaoController::class, 'danhSach'])->name('khoa_dao_tao.danh_sach');





=======
Route::post('/sinh-vien/upload-excel', [SinhVienController::class, 'uploadExcel'])->name('sinh_vien.upload_excel');
Route::post('/giao-vien/upload-excel', [GiaoVienController::class, 'uploadExcel'])->name('giao_vien.upload_excel');

Route::get('/khoa/danh-sach', [KhoaDaoTaoController::class, 'danhSach'])->name('khoa_dao_tao.danh_sach');

Route::get('/diem-danh-ngoai/danh-sach', [DiemDanhNgoaiController::class, 'danhSach'])->name('diem-danh-ngoai.danh_sach');
Route::get('/diem-danh-ngoai/them', [DiemDanhNgoaiController::class, 'Them'])->name('diem-danh-ngoai.them');
Route::post('/diem-danh-ngoai/xu-ly-them', [DiemDanhNgoaiController::class, 'xuLyThem'])->name('diem-danh-ngoai.xu_ly_them');
>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02

Route::post('/lop-hoc-phan/xac-nhan-diem-danh/{ma_diem_danh}', [DiemDanhLopHocPhanController::class, 'xacNhanDiemDanh'])->name('lop_hoc_phan.xac_nhan_diem_danh');
