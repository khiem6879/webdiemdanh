@extends('layouts.app')

@section('content')
<form method="POST">
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
                <label class="form-label">Mã Điểm Danh</label>
                <input name="ma_diem_danh" type="text" class="form-control" placeholder="Mã Điểm Danh" value="{{ old('ma_diem_danh') }}" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Mã QR</label>
                <input name="ma_qr" type="text" class="form-control" placeholder="Mã QR" value="{{ old('ma_qr') }}" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Email Giáo Viên</label>
                <select name="giao_vien_email" class="form-control">
                    @foreach ($giaoviens as $giaovien)
                        <option value="{{ $giaovien->email }}" {{ old('giao_vien_email') == $giaovien->email ? 'selected' : '' }}>{{ $giaovien->ho_ten }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Thời Gian QR</label>
                <input name="thoi_gian_qr" type="datetime-local" class="form-control" value="{{ old('thoi_gian_qr') }}" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Ngày</label>
                <input name="ngay" type="date" class="form-control" value="{{ old('ngay') }}" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Số Lượng</label>
                <input name="so_luong" type="number" class="form-control" placeholder="Số Lượng" value="{{ old('so_luong') }}" required />
            </div>
        </div>
    </div>
    <div class="modal-footer border-0">
        <button type="submit" class="btn btn-primary">Thêm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
    </div>
</form>
@endsection
