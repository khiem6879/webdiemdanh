<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\GiaoVienController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TroLyKhoaController;
use App\Http\Controllers\LopHocPhanController;
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
    return view('trang-chu');
});
Route::get('/DangNhap', [TaiKhoanController::class, 'dangNhap'])->name('DangNhap');
Route::post('/xulyDangNhap', [TaiKhoanController::class, 'xulyDangNhap'])->name('XuLyDangNhap');

Route::middleware(['auth:sinh_vien', 'checkRole:sinh_vien'])->group(function () {
    Route::get('/sinh-vien/trang-chu', [SinhVienController::class, 'trangChu'])->name('sinh_vien.trang_chu');
});

Route::middleware(['auth:giao_vien', 'checkRole:giao_vien'])->group(function () {
    Route::get('/giao-vien/trang-chu', [GiaoVienController::class, 'trangChu'])->name('giao_vien.trang_chu');
});

Route::middleware(['auth:admin', 'checkRole:admin'])->group(function () {
    Route::get('/admin/trang-chu', [AdminController::class, 'trangChu'])->name('admin.trang_chu');
    Route::get('/admin/tro-ly-khoa-danh-sach', [TroLyKhoaController::class, 'danhSach'])->name('tro_ly_khoa.danh_sach');
});

Route::middleware(['auth:tro_ly_khoa', 'checkRole:tro_ly_khoa'])->group(function () {
    Route::get('/tro-ly-khoa/trang-chu', [TroLyKhoaController::class, 'trangChu'])->name('tro_ly_khoa.trang_chu');

    Route::get('/lop-hoc-phan/them', [LopHocPhanController::class, 'themLopHocPhan'])->name('lop_hoc_phan.them');
    Route::post('/lop-hoc-phan/xu-ly-them', [LopHocPhanController::class, 'xulythemLopHocPhan'])->name('lop_hoc_phan.xu_ly_them');
  
    Route::get('/lop-hoc-phan/danh-sach', [LopHocPhanController::class, 'danhSach'])->name('.danh_sach');
});



Route::get('/DangKy', [TaiKhoanController::class, 'dangKy'])->name('DangKy');
Route::post('/themtaikhoanGiaoVien', [TaiKhoanController::class, 'themtaikhoanGiaoVien'])->name('themtaikhoanGiaoVien');



Route::get('/sinhvien/trangchu', [SinhVienController::class, 'trangChu'])->name('sinh_vien.trang_chu');
Route::get('/sinhvien/danhsach', [SinhVienController::class, 'danhSachSinhVien'])->name('sinh_vien.danh_sach');
Route::get('/sinhvien/them', [SinhVienController::class, 'themSinhVien'])->name('sinh_vien.them');
Route::post('/sinhvien/xuly/them', [SinhVienController::class, 'xuLyThemSinhVien'])->name('sinh_vien.xu_ly_them');
Route::get('/sinhvien/capnhat/{MSSV}', [SinhVienController::class, 'capNhatSinhVien'])->name('sinh_vien.cap_nhat');

Route::put('/sinhvien/xuly/capnhat/{MSSV}', [SinhVienController::class, 'xuLyCapNhatSinhVien'])->name('sinh_vien.xu_ly_cap_nhat');




