@extends($layout)

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Danh Sách Sinh Viên Đã Bị Xóa</h1>
        </div>
        <div class="card-body">
            @if (session('thong_bao'))
                <div class="alert alert-success">
                    {{ session('thong_bao') }}
                </div>
            @endif
            <div class="table-responsive">
                <table id="deleted-students" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>MSSV</th>
                            <th>Họ Tên</th>
                            <th>Ngày Sinh</th>
                            <th>Số Điện Thoại</th>
                            <th>CCCD</th>
                            <th>Email</th>
                            <th>Địa Chỉ</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sinhviens as $sinhvien)
                        <tr>
                            <td>{{ $sinhvien->ma_sinh_vien }}</td>
                            <td>{{ $sinhvien->ho_ten }}</td>
                            <td>{{ $sinhvien->ngay_sinh }}</td>
                            <td>{{ $sinhvien->so_dien_thoai }}</td>
                            <td>{{ $sinhvien->so_cccd }}</td>
                            <td>{{ $sinhvien->email }}</td>
                            <td>{{ $sinhvien->dia_chi }}</td>
                            <td>
                                <a href="{{ route('sinh_vien.khoi_phuc', $sinhvien->ma_sinh_vien) }}" class="btn btn-success" data-bs-toggle="tooltip" data-original-title="Khôi phục">
                                    Khôi phục
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-right">
                {{ $sinhviens->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.table th, .table td {
    vertical-align: middle;
    text-align: center;
    white-space: nowrap;
}
</style>
