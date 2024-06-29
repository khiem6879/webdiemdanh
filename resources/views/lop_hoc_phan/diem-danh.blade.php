@extends($layout)
@section('content')
<div class="container">
    <h1>Điểm danh lớp: {{ $lopHocPhan->ten_lop }}</h1>
    <div class="qr-code">
        <img src="{{ asset($maQr) }}" alt="QR Code">
    </div>
    <p>Mã điểm danh sẽ hết hạn vào: {{ $thoiGianQr }}</p>
    <a href="{{ route('lop_hoc_phan.danh_sach') }}" class="btn btn-primary">Quay lại danh sách</a>
</div>
@endsection
