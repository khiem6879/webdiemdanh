<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\GiaoVienController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TroLyKhoaController;
use App\Http\Controllers\LopHocPhanController;
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
    return view('trang-chu');
});
Route::get('/DangNhap', [TaiKhoanController::class, 'dangNhap'])->name('DangNhap');
Route::post('/xulyDangNhap', [TaiKhoanController::class, 'xulyDangNhap'])->name('XuLyDangNhap');

Route::get('/Dangxuat', [TaiKhoanController::class, 'dangXuat'])->name('DangXuat');



Route::middleware(['auth:sinh_vien', 'checkRole:sinh_vien'])->group(function () {
    Route::get('/sinh-vien/trang-chu', [SinhVienController::class, 'trangChu'])->name('sinh_vien.trang_chu');
});

Route::middleware(['auth:giao_vien', 'checkRole:giao_vien'])->group(function () {
    Route::get('/giao-vien/trang-chu', [GiaoVienController::class, 'trangChu'])->name('giao_vien.trang_chu');
});

Route::middleware(['auth:admin', 'checkRole:admin'])->group(function () {
   
   // Route::get('/admin/tro-ly-khoa-danh-sach', [TroLyKhoaController::class, 'danhSach'])->name('tro_ly_khoa.danh_sach');
});

Route::middleware(['auth:tro_ly_khoa', 'checkRole:tro_ly_khoa'])->group(function () {
    
   
   
  
    
});



Route::get('/DangKy', [TaiKhoanController::class, 'dangKy'])->name('DangKy');
Route::post('/themtaikhoanGiaoVien', [TaiKhoanController::class, 'themtaikhoanGiaoVien'])->name('themtaikhoanGiaoVien');

Route::get('/admin/trang-chu', [AdminController::class, 'trangChu'])->name('admin.trang_chu');
Route::get('/sinh-vien/trang-chu', [SinhVienController::class, 'trangChu'])->name('sinh_vien.trang_chu');
Route::get('/sinh-vien/danh-sach', [SinhVienController::class, 'danhSachSinhVien'])->name('sinh_vien.danh_sach');
Route::get('/sinh-vien/them', [SinhVienController::class, 'themSinhVien'])->name('sinh_vien.them');
Route::post('/sinh-vien/xu-ly-them', [SinhVienController::class, 'xuLyThemSinhVien'])->name('sinh_vien.xu_ly_them');
Route::get('sinh-vien/cap-nhat/{ma_sinh_vien}', [SinhVienController::class, 'capNhatSinhVien'])->name('sinh_vien.cap_nhat');
Route::put('sinh-vien/xu-ly-cap-nhat/{ma_sinh_vien}', [SinhVienController::class, 'xuLyCapNhatSinhVien'])->name('sinh_vien.xu_ly_cap_nhat');
Route::delete('/sinh-vien/xoa/{ma_sinh_vien}', [SinhVienController::class, 'xoaSinhVien'])->name('sinh_vien.xoa');
Route::get('/sinh-vien/tim-kiem', [SinhVienController::class, 'timKiem'])->name('sinh_vien.tim_kiem');



Route::get('/giao-vien/trang-chu', [GiaoVienController::class, 'trangChu'])->name('giao_vien.trang_chu');
Route::get('/giao-vien/danh-sach', [GiaoVienController::class, 'danhSach'])->name('giao_vien.danh_sach');
Route::get('/giao-vien/them', [GiaoVienController::class, 'Them'])->name('giao_vien.them');
Route::post('/giao-vien/them', [GiaoVienController::class, 'xuLyThem'])->name('giao_vien.xu_ly_them');
Route::get('giao-vien/cap-nhat/{giao_vien_email}', [GiaoVienController::class,'capNhat'])->name('giao_vien.cap_nhat');
Route::put('giao-vien/xu-ly-cap-nhat/{giao_vien_email}', [GiaoVienController::class,'xuLyCapNhat'])->name('giao_vien.xu_ly_cap_nhat');


Route::get('/khoa/danh-sach', [KhoaDaoTaoController::class, 'danhSach'])->name('khoa_dao_tao.danh_sach');

Route::get('/tro-ly-khoa/trang-chu', [TroLyKhoaController::class, 'trangChu'])->name('tro_ly_khoa.trang_chu');
Route::get('/tro-ly-khoa/danh-sach', [TroLyKhoaController::class, 'danhSachGiaoVien'])->name('tro_ly_khoa.danh_sach');

Route::get('/diem-danh-ngoai/danh-sach',[DiemDanhNgoaiController::class,'danhSach'])->name('diem-danh-ngoai.danh_sach');

Route::post('/lop-hoc-phan/xu-ly-them', [LopHocPhanController::class, 'xulythemLopHocPhan'])->name('lop_hoc_phan.xu_ly_them');
Route::get('/lop-hoc-phan/danh-sach', [LopHocPhanController::class, 'danhSach'])->name('.danh_sach');