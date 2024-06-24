@extends($layout)
@section('content')
<div class="container">
    <h1>Danh sách Lớp Sinh Viên</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Lớp</th>
                <th>Tên Lớp</th>
                <th>Giáo Viên</th>
                <th>Sinh Viên</th>
                <th>Khoa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lopSinhViens as $lopSinhVien)
                <tr>
                    <td>{{ $lopSinhVien->ma_lop }}</td>
                    <td>{{ $lopSinhVien->ten_lop }}</td>
                    <td>{{ $lopSinhVien->giao_vien_email }}</td>              
                    <td>
                        @if(is_array(json_decode($lopSinhVien->sinh_vien_mssv)))
                            @foreach (json_decode($lopSinhVien->sinh_vien_mssv) as $mssv)
                                {{ $mssv }}<br> 
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $lopSinhVien->khoa->ten_khoa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
