@extends('tro_ly_khoa/trang-chu')
@section('content')
<div class="container">
    <h1>Thêm Lớp Học Phần</h1>
    <form action="{{ route('tro_ly_khoa.xu_ly_them_lop_hoc_pham') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ma_lop">Mã Lớp</label>
            <input type="text" class="form-control" id="ma_lop" name="ma_lop" value="{{ Str::random(6) }}" required>
        </div>
        <div class="form-group">
            <label for="ten_lop">Tên Lớp</label>
            <input type="text" class="form-control" id="ten_lop" name="ten_lop" required>
        </div>
        <div class="form-group">
            <label for="giao_vien">Giáo Viên</label>
            <select multiple class="form-control" id="giao_vien" name="giao_vien[]">
                @foreach ($giaoViens as $giaoVien)
                    <option value="{{ $giaoVien->email }}">{{ $giaoVien->ho_ten }} ({{ $giaoVien->email }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="sinh_vien">Sinh Viên</label>
            <select multiple class="form-control" id="sinh_vien" name="sinh_vien[]">
                @foreach ($sinhViens as $sinhVien)
                    <option value="">{{ $sinhVien->ma_sinh_vien }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="khoa_id">Khoa</label>
            <select class="form-control" id="khoa_id" name="khoa_id">
                @foreach ($khoaDaoTao as $khoa)
                    <option value="{{ $khoa->khoa_id }}">{{ $khoa->ten_khoa }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection