@extends($layout)
@section('content')
<div class="container">
    <h1>Danh sách Lớp Học Phần</h1>
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
            @foreach ($lopHocPhans as $lopHocPhan)
                <tr>
                    <td>{{ $lopHocPhan->ma_lop }}</td>
                    <td>{{ $lopHocPhan->ten_lop }}</td>
                   <td>
                        @if(is_array(json_decode($lopHocPhan->giao_vien_email)))
                            @foreach (json_decode($lopHocPhan->giao_vien_email) as $email)
                                {{ $email }}<br>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if(is_array(json_decode($lopHocPhan->sinh_vien_mssv)))
                            @foreach (json_decode($lopHocPhan->sinh_vien_mssv) as $mssv)
                                {{ $mssv }}<br> 
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $lopHocPhan->khoa->ten_khoa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
