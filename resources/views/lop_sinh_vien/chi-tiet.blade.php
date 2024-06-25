@extends($layout)

@section('content')
<div class="container">

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3"><strong>Mã Lớp:</strong> {{ $lopSinhVien->ma_lop }}</div>
                <div class="col-md-3"><strong>Tên Lớp:</strong> {{ $lopSinhVien->ten_lop }}</div>
                <div class="col-md-3"><strong>Giáo Viên:</strong> {{  $lopSinhVien->giaoVien->ho_ten}}</div>
                <div class="col-md-3"><strong>Khoa:</strong> {{ $lopSinhVien->khoa->ten_khoa }}</div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>MSSV</th>
                            <th>HỌ TÊN</th>
                            <th>NGÀY SINH</th>
                            <th>SỐ ĐIỆN THOẠI</th>
                            <th>CCCD</th>
                            <th>EMAIL</th>
                            <th>ĐỊA CHỈ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $sinhvien)
                            <tr>
                                <td>{{ $sinhvien->ma_sinh_vien }}</td>
                                <td>{{ $sinhvien->ho_ten }}</td>
                                <td>{{ $sinhvien->ngay_sinh }}</td>
                                <td>{{ $sinhvien->so_dien_thoai }}</td>
                                <td>{{ $sinhvien->so_cccd }}</td>
                                <td>{{ $sinhvien->email }}</td>
                                <td>{{ $sinhvien->dia_chi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $students->links('pagination::bootstrap-4')  }}
            </div>
            <a href="{{ route('giao_vien.lop_sinh_vien.danh_sach') }}" class="btn btn-secondary mb-3">
                
                <i class="fa fa-arrow-left fa-sm"></i> Quay Lại
            </a>   
        </div>
    </div>
</div>
@endsection