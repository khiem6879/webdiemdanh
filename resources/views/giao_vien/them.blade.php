@extends($layout)

@section('content')
<form action="{{ route('giao_vien.xu_ly_them') }}" method="POST">
    @csrf
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Họ tên</label>
                <input name="ho_ten" type="text" class="form-control" placeholder="Họ tên" value="{{ old('ho_ten') }}" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Mật khẩu</label>
                <input name="mat_khau" type="password" class="form-control" placeholder="Mật khẩu" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Khoa</label>
                <select name="khoa_id" class="form-control">
                    @foreach ($khoas as $khoa)
                        <option value="{{ $khoa->khoa_id }}" {{ old('khoa_id') == $khoa->khoa_id ? 'selected' : '' }}>{{ $khoa->ten_khoa }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Ngày sinh</label>
                <input name="ngay_sinh" type="date" class="form-control" value="{{ old('ngay_sinh') }}" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Số điện thoại</label>
                <input name="so_dien_thoai" type="text" class="form-control" placeholder="Số điện thoại" value="{{ old('so_dien_thoai') }}" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">CCCD</label>
                <input name="so_cccd" type="text" class="form-control" placeholder="CCCD" value="{{ old('so_cccd') }}" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Địa chỉ</label>
                <input name="dia_chi" type="text" class="form-control" placeholder="Địa chỉ" value="{{ old('dia_chi') }}" required />
            </div>
        </div>
    </div>
    <div class="modal-footer border-0">
        <button type="submit" class="btn btn-primary">Thêm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
    </div>
</form>
@endsection
