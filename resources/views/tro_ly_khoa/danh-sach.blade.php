@extends('tro_ly_khoa/trang-chu')
@section('content')
<div class="container">
    <h1>Thông tin trợ lý khoa</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Email:</strong> {{ $troLyKhoa->email }}</p>
            <p><strong>Họ và tên:</strong> {{ $troLyKhoa->ho_ten }}</p>
            <p><strong>Số điện thoại:</strong> {{ $troLyKhoa->sdt }}</p>
            <p><strong>Thời gian đăng nhập cuối:</strong> {{ $troLyKhoa->thoi_gian_dang_nhap_cuoi }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Khoa:</strong> {{ $khoa->ten_khoa }}</p>
            <!-- Nếu bạn có hình ảnh đại diện (avatar) -->
            {{-- <img src="{{ $troLyKhoa->avt }}" alt="Avatar" class="img-fluid"> --}}
        </div>
    </div>
</div>
@endsection