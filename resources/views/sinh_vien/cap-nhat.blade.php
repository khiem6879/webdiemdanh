
@extends($layout)


@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Cập Nhật Sinh Viên</h1>
        </div>
        <div class="card-body">
        <form action="{{ route('sinh_vien.xu_ly_sua', $sinh_vien->ma_sinh_vien) }}" method="POST">
    @csrf
    @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">MSSV</label>
                            <input name="ma_sinh_vien" type="text" class="form-control" placeholder="MSSV" value="{{ $sinh_vien->ma_sinh_vien }}" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Họ tên</label>
                            <input name="ho_ten" type="text" class="form-control" placeholder="Họ tên" value="{{ $sinh_vien->ho_ten }}" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Ngày sinh</label>
                            <input name="ngay_sinh" type="date" class="form-control" placeholder="Ngày sinh" value="{{ $sinh_vien->ngay_sinh }}" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input name="so_dien_thoai" type="text" class="form-control" placeholder="Số điện thoại" value="{{ $sinh_vien->so_dien_thoai }}" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">CCCD</label>
                            <input name="so_cccd" type="text" class="form-control" placeholder="CCCD" value="{{ $sinh_vien->so_cccd }}" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Email" value="{{ $sinh_vien->email }}" required />
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
                            <label class="form-label">Địa chỉ</label>
                            <input name="dia_chi" type="text" class="form-control" placeholder="Địa chỉ" value="{{ $sinh_vien->dia_chi }}" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary">
                        Cập nhật
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
