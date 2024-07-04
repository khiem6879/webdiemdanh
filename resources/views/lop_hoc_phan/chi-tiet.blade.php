@extends($layout)

@section('content')
<div class="container">

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3"><strong>Mã Lớp:</strong> {{ $lopHocPhan->ma_lop }}</div>
                <div class="col-md-3"><strong>Tên Lớp:</strong> {{ $lopHocPhan->ten_lop }}</div>
                <div class="col-md-3"><strong>Môn Học:</strong> {{  $lopHocPhan->monHoc->ten_mon }}</div>
                <div class="col-md-3"><strong>Khoa:</strong> {{ $lopHocPhan->khoa->ten_khoa }}</div>
         
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12"><strong>Giáo Viên:</strong>
                    <span>
                        @foreach ($giaovienEmails as $index => $email)
                            {{ $email }}@if(!$loop->last) &nbsp; - &nbsp; @endif
                        @endforeach
                    </span>
                </div>
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
                                <td>{{ $Carbon::parse($sinhvien->ngay_sinh)->format('d-m-Y') }}</td>
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
                {{ $students->links('pagination::bootstrap-4') }}
            </div>
            <a href="{{ route('lop_hoc_phan.danh_sach') }}" class="btn btn-secondary mb-3">
                <i class="fa fa-arrow-left fa-sm"></i> Quay Lại
            </a>   
        </div>
    </div>
</div>
@endsection