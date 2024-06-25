<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\GiaoVienController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TroLyKhoaController;
use App\Http\Controllers\LopHocPhanController;
use App\Http\Controllers\LopSinhVienController;

use App\Http\Controllers\KhoaDaoTaoController;

use App\Http\Controllers\DiemDanhNgoaiController;

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
    return view('tai_khoan/dang-nhap');
});

Route::get('/Dang-Ky', [TaiKhoanController::class, 'dangKy'])->name('DangKy');
Route::post('/Dang-Ky', [TaiKhoanController::class, 'xulyDangKy'])->name('xu_ly_dang_ky');

Route::get('/DangNhap', [TaiKhoanController::class, 'dangNhap'])->name('DangNhap'); 
Route::post('/xulyDangNhap', [TaiKhoanController::class, 'xulyDangNhap'])->name('XuLyDangNhap');
Route::get('/tai-khoan-thong-tin', [TaiKhoanController::class, 'thongtinTaiKhoan'])->name('tai_khoan.thong-tin-tai-khoan');

Route::get('/Dangxuat', [TaiKhoanController::class, 'dangXuat'])->name('DangXuat');
Route::get('/tai-khoan/doi-mat-khau', [TaiKhoanController::class, 'hienThiDoiMatKhau'])->name('tai_khoan.doi_mat_khau');
Route::post('/tai-khoan/doi-mat-khau', [TaiKhoanController::class, 'doiMatKhau'])->name('tai_khoan.cap_nhat_mat_khau');

Route::get('/taikhoan/sua', [TaiKhoanController::class, 'suaTaiKhoan'])->name('tai_khoan.sua');

Route::post('/taikhoan/xulysua', [TaiKhoanController::class, 'xulysuaTaiKhoan'])->name('tai_khoan.xu_ly_sua');

// Route::middleware(['auth:sinh_vien', 'checkRole:sinh_vien'])->group(function () {
//     Route::get('/sinh-vien/trang-chu', [SinhVienController::class, 'trangChu'])->name('sinh_vien.trang_chu');
// });

Route::middleware(['auth:giao_vien', 'checkRole:giao_vien'])->group(function () {
    Route::get('giao-vien/sinh-vien/danh-sach', [SinhVienController::class, 'danhSachSinhVien'])->name('sinh_vien.danh_sach');
    Route::get('/giao-vien/lop-sinh-vien/danh-sach', [LopSinhVienController::class, 'danhSach'])->name('giao_vien.lop_sinh_vien.danh_sach');
    Route::get('/giao-vien/trang-chu', [GiaoVienController::class, 'trangChu'])->name('giao_vien.trang_chu');
    Route::get('/giao-vien/lop-sinh-vien/them', [LopSinhVienController::class, 'themLopSinhVien'])->name('lop_sinh_vien.them');
   
    Route::post('/giao-vien/lop-sinh-vien/xu-ly-them', [LopSinhVienController::class, 'xulythemLopSinhVien'])->name('lop_sinh_vien.xu_ly_them');
    Route::get('/giao-vien/lop-sinh-vien/chi-tiet/{ma_lop}', [LopSinhVienController::class, 'chiTiet'])->name('lop_sinh_vien.chi_tiet');

});



Route::middleware(['auth:admin', 'checkRole:admin'])->group(function () {
    Route::get('/admin/trang-chu', [AdminController::class, 'trangChu'])->name('admin.trang_chu');
    Route::get('/admin/giao-vien/danh-sach', [GiaoVienController::class, 'danhSach'])->name('giao_vien.danh_sach');
    Route::get('/admin/lop-sinh-vien/danh-sach', [LopSinhVienController::class, 'danhSach'])->name('lop_sinh_vien.danh_sach');
    Route::get('/admin/sinh-vien/danh-sach', [SinhVienController::class, 'danhSachSinhVien'])->name('sinh_vien.danh_sach');
    Route::get('/admin/trang-chu', [AdminController::class, 'trangChu'])->name('admin.trang_chu');
    Route::get('/admin/tro-ly-khoa/danh-sach', [TroLyKhoaController::class, 'danhSach'])->name('tro_ly_khoa.danh_sach');
    Route::get('admin/lop-hoc-phan/danh-sach', [LopHocPhanController::class, 'danhSach'])->name('lop_hoc_phan.danh_sach');
});

Route::middleware(['auth:tro_ly_khoa', 'checkRole:tro_ly_khoa'])->group(function () {
    
    Route::get('/lop-hoc-phan/them', [LopHocPhanController::class, 'themLopHocPhan'])->name('lop_hoc_phan.them');
    Route::post('/lop-hoc-phan/xu-ly-them', [LopHocPhanController::class, 'xulythemLopHocPhan'])->name('lop_hoc_phan.xu_ly_them');
    Route::get('/lop-hoc-phan/danh-sach', [LopHocPhanController::class, 'danhSach'])->name('lop_hoc_phan.danh_sach');
    
});





Route::get('/sinhvien/trangchu', [SinhVienController::class, 'trangChu'])->name('sinh_vien.trang_chu');

Route::get('/sinhvien/them', [SinhVienController::class, 'themSinhVien'])->name('sinh_vien.them');
Route::post('/sinhvien/xuly/them', [SinhVienController::class, 'xuLyThemSinhVien'])->name('sinh_vien.xu_ly_them');
Route::get('/sinhvien/capnhat/{MSSV}', [SinhVienController::class, 'capNhatSinhVien'])->name('sinh_vien.cap_nhat');
Route::delete('/sinh-vien/xoa/{MSSV}', [SinhVienController::class, 'xoaSinhVien'])->name('sinh_vien.xoa');
Route::put('/sinhvien/xuly/capnhat/{MSSV}', [SinhVienController::class, 'xuLyCapNhatSinhVien'])->name('sinh_vien.xu_ly_cap_nhat');




Route::get('/sinh-vien/tim-kiem', [SinhVienController::class, 'timKiem'])->name('sinh_vien.tim_kiem');



Route::get('/giao-vien/trang-chu', [GiaoVienController::class, 'trangChu'])->name('giao_vien.trang_chu');
Route::get('/giao-vien/danh-sach', [GiaoVienController::class, 'danhSach'])->name('giao_vien.danh_sach');
Route::get('/giao-vien/them', [GiaoVienController::class, 'Them'])->name('giao_vien.them');
Route::post('/giao-vien/them', [GiaoVienController::class, 'xuLyThem'])->name('giao_vien.xu_ly_them');


Route::get('/khoa/danh-sach', [KhoaDaoTaoController::class, 'danhSach'])->name('khoa_dao_tao.danh_sach');

Route::get('/tro-ly-khoa/trang-chu', [TroLyKhoaController::class, 'trangChu'])->name('tro_ly_khoa.trang_chu');
Route::get('/tro-ly-khoa/danh-sach', [TroLyKhoaController::class, 'danhSachGiaoVien'])->name('tro_ly_khoa.danh_sach');

Route::get('/diem-danh-ngoai/danh-sach',[DiemDanhNgoaiController::class,'danhSach'])->name('diem-danh-ngoai.danh_sach');

