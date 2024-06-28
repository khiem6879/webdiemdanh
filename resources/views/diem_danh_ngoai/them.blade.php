@extends('giao_vien.trang-chu')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Thêm Điểm Danh Ngoài</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('diem-danh-ngoai.xu_ly_them') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="ma_diem_danh">Mã Điểm Danh</label>
                    <input type="text" class="form-control" id="ma_diem_danh" name="ma_diem_danh" required>
                </div>
                <div class="form-group">
                    <label for="giao_vien_email">Giáo Viên Email</label>
                    <input type="email" class="form-control" id="giao_vien_email" name="giao_vien_email" required>
                </div>
                <div class="form-group">
                    <label for="thoi_gian_qr">Thời Gian QR</label>
                    <input type="datetime-local" class="form-control" id="thoi_gian_qr" name="thoi_gian_qr">
                </div>
                <div class="form-group">
                    <label for="ngay">Ngày</label>
                    <input type="date" class="form-control" id="ngay" name="ngay">
                </div>
                <div class="form-group">
                    <label for="so_luong">Số Lượng</label>
                    <input type="number" class="form-control" id="so_luong" name="so_luong">
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
</div>
@endsection
