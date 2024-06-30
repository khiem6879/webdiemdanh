@extends($layout)
@section('content')
<div class="container">
    <h1>Chi tiết Điểm Danh</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Điểm Danh</th>
                <th>Mã Sinh Viên</th>
                <th>Tên Sinh Viên</th>
                <th>Trạng Thái</th>
                <th>Thời Gian</th>
                <th>Vị Trí</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chiTietDiemDanhs as $chiTiet)
                <tr>
                    <td>{{ $chiTiet->ma_diem_danh }}</td>
                    <td>{{ $chiTiet->ma_sinh_vien }}</td>
                    <td>{{ $chiTiet->sinhVien->ho_ten }}</td>
                    <td>{{ $chiTiet->trang_thai }}</td>
                    <td>{{ $chiTiet->thoi_gian }}</td>
                    <td>{{ $chiTiet->vi_tri }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<style>
.table th, .table td {
    vertical-align: middle;
    text-align: center;
    white-space: nowrap;/* Ngăn chặn ngắt dòng */
}
</style>
@endsection
