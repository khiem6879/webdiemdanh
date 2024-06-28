@extends('tro_ly_khoa.trang-chu')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Cập Nhật Trợ Lý Khoa</h1>
        </div>
        <div class="card-body">
        <form action="{{ route('tro_ly_khoa.xu_ly_sua', $troLyKhoa->email) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Email" value="{{ $troLyKhoa->email }}" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Họ tên</label>
                            <input name="ho_ten" type="text" class="form-control" placeholder="Họ tên" value="{{  $troLyKhoa->ho_ten }}" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Mật khẩu</label>
                            <input name="mat_khau" type="password" class="form-control" placeholder="Mật khẩu" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Khoa</label>
                            <select name="khoa_id" class="form-control" required>
                                @foreach ($khoas as $khoa)
                                    <option value="{{ $khoa->khoa_id }}" >
                                        {{ $khoa->ten_khoa }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   

    

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Ngày sinh</label>
                            <input name="ngay_sinh" type="date" class="form-control" placeholder="Ngày sinh" value="{{  $troLyKhoa->ngay_sinh }}" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input name="so_dien_thoai" type="text" class="form-control" placeholder="Số điện thoại" value="{{  $troLyKhoa->so_dien_thoai }}" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">CCCD</label>
                            <input name="so_cccd" type="text" class="form-control" placeholder="CCCD" value="{{  $troLyKhoa->so_cccd }}" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <input name="dia_chi" type="text" class="form-control" placeholder="Địa chỉ" value="{{  $troLyKhoa->dia_chi }}" required />
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
