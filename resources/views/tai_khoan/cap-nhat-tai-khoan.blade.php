@extends($layout)

@section('content')
<div class="container">
    <h1>Chỉnh Sửa Thông Tin Tài Khoản</h1>
    <form action="{{ route('tai_khoan.xu_ly_sua') }}" method="POST">
        @csrf
        <div class="row">
            @if($role === 'sinh_vien')
                <div class="col-md-6 form-group">
                    <label for="ma_sinh_vien">MSSV</label>
                    <input type="text" name="ma_sinh_vien" id="ma_sinh_vien" class="form-control" value="{{ $user->ma_sinh_vien }}" readonly>
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="ho_ten">Họ Tên</label>
                    <input type="text" name="ho_ten" id="ho_ten" class="form-control" value="{{ $user->ho_ten }}">
                    @error('ho_ten')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="so_cccd">CCCD</label>
                    <input type="text" name="so_cccd" id="so_cccd" class="form-control" value="{{ $user->so_cccd }}">
                    @error('so_cccd')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="so_dien_thoai">Số Điện Thoại</label>
                    <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control" value="{{ $user->so_dien_thoai }}">
                    @error('so_dien_thoai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="ngay_sinh">Ngày Sinh</label>
                    <input type="date" name="ngay_sinh" id="ngay_sinh" class="form-control" value="{{ $user->ngay_sinh }}">
                    @error('ngay_sinh')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="dia_chi">Địa Chỉ</label>
                    <input type="text" name="dia_chi" id="dia_chi" class="form-control" value="{{ $user->dia_chi }}">
                    @error('dia_chi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            @elseif($role === 'giao_vien')
                <div class="col-md-6 form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="ho_ten">Họ Tên</label>
                    <input type="text" name="ho_ten" id="ho_ten" class="form-control" value="{{ $user->ho_ten }}">
                    @error('ho_ten')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="so_dien_thoai">Số Điện Thoại</label>
                    <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control" value="{{ $user->so_dien_thoai }}">
                    @error('so_dien_thoai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="ngay_sinh">Ngày Sinh</label>
                    <input type="date" name="ngay_sinh" id="ngay_sinh" class="form-control" value="{{ $user->ngay_sinh }}">
                    @error('ngay_sinh')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="dia_chi">Địa Chỉ</label>
                    <input type="text" name="dia_chi" id="dia_chi" class="form-control" value="{{ $user->dia_chi }}">
                    @error('dia_chi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="cccd">CCCD</label>
                    <input type="text" name="so_cccd" id="so_cccd" class="form-control" value="{{ $user->so_cccd }}">
                    @error('so_cccd')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="khoa_id">Khoa</label>
                    <input type="text" name="khoa" id="khoa" class="form-control" value="{{ $user->khoa->ten_khoa }}" readonly>
                    <input type="hidden" name="khoa_id" id="khoa_id" class="form-control" value="{{ $user->khoa_id }}">
                    @error('khoa_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            @elseif($role === 'tro_ly_khoa')
                <div class="col-md-6 form-group">
                    <label for="avt">Ảnh đại diện</label>
                    <input type="text" name="avt" id="avt" class="form-control" value="{{ $user->avt }}">
                    @error('avt')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="khoa_id">Khoa</label>
                    <input type="text" name="khoa" id="khoa" class="form-control" value="{{ $user->khoa->ten_khoa }}" readonly>
                    <input type="hidden" name="khoa_id" id="khoa_id" class="form-control" value="{{ $user->khoa_id }}">
                    @error('khoa_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="ho_ten">Họ Tên</label>
                    <input type="text" name="ho_ten" id="ho_ten" class="form-control" value="{{ $user->ho_ten }}">
                    @error('ho_ten')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="so_dien_thoai">Số Điện Thoại</label>
                    <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control" value="{{ $user->so_dien_thoai }}">
                    @error('so_dien_thoai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="thoi_gian_dang_nhap_cuoi">Thời Gian Đăng Nhập Cuối</label>
                    <input type="text" name="thoi_gian_dang_nhap_cuoi" id="thoi_gian_dang_nhap_cuoi" class="form-control" value="{{ $user->thoi_gian_dang_nhap_cuoi }}">
                    @error('thoi_gian_dang_nhap_cuoi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            @elseif($role === 'admin')
                <!-- Tùy chỉnh form cho role admin -->
            @endif
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-key"></i> Cập Nhật
        </button>
    </form>
</div>
@endsection
