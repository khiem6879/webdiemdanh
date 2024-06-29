@extends($layout)
@section('content')
<div class="container">
    <h1>Danh sách Điểm Danh</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Điểm Danh</th>
                <th>Mã Lớp</th>
                <th>Mã QR</th>
                <th>Thời Gian QR</th>
                <th>Ngày</th>
                <th>Chỉnh Sửa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diemDanhs as $diemDanh)
                <tr>
                    <td>{{ $diemDanh->ma_diem_danh }}</td>
                    <td>{{ $diemDanh->ma_lop }}</td>
                    <td>
                    <img src="{{ asset('storage/qr_codes/' . $diemDanh->ma_qr) }}" alt="QR Code" style="width: 100px;">
                        <!-- <p>{{ asset($diemDanh->ma_qr) }}</p> Thêm dòng này để kiểm tra đường dẫn -->
                    </td>
                    <td>{{ $diemDanh->thoi_gian_qr }}</td>
                    <td>{{ $diemDanh->ngay }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm"
                            onclick="editTime('{{ $diemDanh->ma_diem_danh }}', '{{ $diemDanh->thoi_gian_qr }}')">Chỉnh
                            Sửa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $diemDanhs->links('pagination::bootstrap-4') }}
    </div>
</div>


@endsection