@extends('admin.trang-chu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Thêm Sinh Viên</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('sinh_vien.xu_ly_them') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="ma_sinh_vien">Mã Sinh Viên</label>
                            <input type="text" name="ma_sinh_vien" class="form-control @error('ma_sinh_vien') is-invalid @enderror" value="{{ old('ma_sinh_vien') }}">
                            @error('ma_sinh_vien')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="ho_ten">Họ Tên</label>
                            <input type="text" name="ho_ten" class="form-control @error('ho_ten') is-invalid @enderror" value="{{ old('ho_ten') }}">
                            @error('ho_ten')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="ngay_sinh">Ngày Sinh</label>
                            <input type="date" name="ngay_sinh" class="form-control @error('ngay_sinh') is-invalid @enderror" value="{{ old('ngay_sinh') }}">
                            @error('ngay_sinh')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="dia_chi">Địa Chỉ</label>
                            <input type="text" name="dia_chi" class="form-control @error('dia_chi') is-invalid @enderror" value="{{ old('dia_chi') }}">
                            @error('dia_chi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="so_cccd">Số CCCD</label>
                            <input type="text" name="so_cccd" class="form-control @error('so_cccd') is-invalid @enderror" value="{{ old('so_cccd') }}">
                            @error('so_cccd')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="so_dien_thoai">Số Điện Thoại</label>
                            <input type="text" name="so_dien_thoai" class="form-control @error('so_dien_thoai') is-invalid @enderror" value="{{ old('so_dien_thoai') }}">
                            @error('so_dien_thoai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="mat_khau">Mật Khẩu</label>
                            <input type="password" name="mat_khau" class="form-control @error('mat_khau') is-invalid @enderror">
                            @error('mat_khau')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="dia_chi">Địa Chỉ</label>
                            <input type="text" name="dia_chi" class="form-control @error('dia_chi') is-invalid @enderror" value="{{ old('dia_chi') }}">
                            @error('dia_chi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
