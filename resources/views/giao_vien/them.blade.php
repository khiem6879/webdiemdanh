@extends('admin.trang-chu')

@section('content')
<form action="{{ route('giao_vien.xu_ly_them') }}" method="POST" >
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Họ tên</label>
                <input name="ho_ten" type="text" class="form-control @error('ho_ten') is-invalid @enderror" placeholder="Họ tên" value="{{ old('ho_ten') }}"  />
                @error('ho_ten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}"  />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Mật khẩu</label>
                <input name="mat_khau" type="password" class="form-control @error('mat_khau') is-invalid @enderror" placeholder="Mật khẩu"  />
                @error('mat_khau')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Khoa</label>
                <select name="khoa_id" class="form-control @error('khoa_id') is-invalid @enderror">
                    @foreach ($khoas as $khoa)
                        <option value="{{ $khoa->khoa_id }}">{{ $khoa->ten_khoa }}</option>
                    @endforeach
                </select>
                @error('khoa_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Ngày sinh</label>
                <input name="ngay_sinh" type="date" class="form-control @error('ngay_sinh') is-invalid @enderror" value="{{ old('ngay_sinh') }}"  />
                @error('ngay_sinh')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Số điện thoại</label>
                <input name="so_dien_thoai" type="text" class="form-control @error('so_dien_thoai') is-invalid @enderror" placeholder="Số điện thoại" value="{{ old('so_dien_thoai') }}" />
                @error('so_dien_thoai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">CCCD</label>
                <input name="so_cccd" type="text" class="form-control @error('so_cccd') is-invalid @enderror" placeholder="CCCD" value="{{ old('so_cccd') }}" />
                @error('so_cccd')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Địa chỉ</label>
                <input name="dia_chi" type="text" class="form-control @error('dia_chi') is-invalid @enderror" placeholder="Địa chỉ" value="{{ old('dia_chi') }}"  />
                @error('dia_chi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="modal-footer border-0">
        <button type="submit" class="btn btn-primary">Thêm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
    </div>
</form>
@endsection
