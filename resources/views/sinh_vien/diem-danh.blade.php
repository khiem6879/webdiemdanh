@extends('sinh_vien.trang-chu')

@section('content')

<div class="container">
    <h1>Điểm Danh</h1>
    <form action="{{ route('lop_hoc_phan.xac_nhan_diem_danh', ['ma_diem_danh' => $diemDanh->ma_diem_danh]) }}" method="POST">
        @csrf
        <input type="hidden" name="ma_diem_danh" value="{{ $diemDanh->ma_diem_danh }}">
        <input type="hidden" id="vi_tri" name="vi_tri">
        <input type="hidden" id="ma_sinh_vien" name="ma_sinh_vien" value="{{ $maSinhVien }}">
        <div class="form-group">
            <label for="ma_sinh_vien_display">Mã sinh viên:</label>
            <input type="text" id="ma_sinh_vien_display" name="ma_sinh_vien_display" class="form-control" value="{{ $maSinhVien }}" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Điểm danh</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('vi_tri').value = `${position.coords.latitude}, ${position.coords.longitude}`;
                    form.submit();
                }, function(error) {
                    alert('Không thể lấy vị trí hiện tại của bạn. Vui lòng thử lại.');
                });
            } else {
                alert('Trình duyệt của bạn không hỗ trợ Geolocation.');
            }
        });
    });
</script>

@endsection
