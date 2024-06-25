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
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lopSinhViens as $lopSinhVien)
                <tr>
                    <td>{{ $lopSinhVien->ma_lop }}</td>
                    <td>{{ $lopSinhVien->ten_lop }}</td>
                    <td>{{ $lopSinhVien->giaoVien->ho_ten }}</td>   
                    <td>
                        <div class="student-list" id="student-list-{{ $lopSinhVien->ma_lop }}">
                            @if(is_array(json_decode($lopSinhVien->sinh_vien_mssv)))
                                @foreach (json_decode($lopSinhVien->sinh_vien_mssv) as $index => $mssv)
                                    <span class="student-item {{ $index >= 3 ? 'd-none' : '' }}">
                                        {{ $mssv }}<br>
                                    </span>
                                @endforeach
                            @endif
                        </div>
                        @if(is_array(json_decode($lopSinhVien->sinh_vien_mssv)) && count(json_decode($lopSinhVien->sinh_vien_mssv)) > 3)
                            <a href="#" class="toggle-students btn btn-sm btn-link" data-id="{{ $lopSinhVien->ma_lop }}" onclick="toggleStudents('{{ $lopSinhVien->ma_lop }}')">
                                <i class="fa fa-eye"></i> Hiện thêm
                            </a>
                        @endif
                    </td>
                    <td>{{ $lopSinhVien->khoa->ten_khoa }}</td>
                    <td>
                        <a href="{{ route('lop_sinh_vien.chi_tiet', $lopSinhVien->ma_lop) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-info-circle"></i> Chi Tiết
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function toggleStudents(maLop) {
        var studentList = document.getElementById('student-list-' + maLop);
        var studentItems = studentList.getElementsByClassName('student-item');
        var toggleLink = studentList.nextElementSibling;

        for (var i = 3; i < studentItems.length; i++) {
            if (studentItems[i].classList.contains('d-none')) {
                studentItems[i].classList.remove('d-none');
                toggleLink.innerHTML = '<i class="fa fa-eye-slash"></i> Ẩn bớt';
            } else {
                studentItems[i].classList.add('d-none');
                toggleLink.innerHTML = '<i class="fa fa-eye"></i> Hiện thêm';
            }
        }
    }
</script>
@endsection
