@extends($layout)
@section('content')
<div class="container">
    <h1>Danh sách Lớp Học Phần</h1>
    
    <!-- Thêm ô tìm kiếm -->
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm theo mã lớp hoặc tên lớp">
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Lớp</th>
                <th>Tên Lớp</th>
                <th>Giáo Viên</th>
                <th>Sinh Viên</th>
                <th>Môn Học</th>
                <th>Khoa</th>
                <th>Chi Tiết</th>
                <th>Điểm Danh</th> <!-- Thêm cột Điểm Danh -->
            </tr>
        </thead>
        <tbody id="classList">
            @foreach ($lopHocPhans as $lopHocPhan)
                <tr>
                    <td>{{ $lopHocPhan->ma_lop }}</td>
                    <td>{{ $lopHocPhan->ten_lop }}</td>
                    <td>
                        <span>
                            @if(is_array(json_decode($lopHocPhan->giao_vien_email)))
                                @foreach (json_decode($lopHocPhan->giao_vien_email) as $index => $email)
                                    {{ $email }}<br>
                                @endforeach
                            @endif
                        </span>
                    </td>
                    <td>
                        <div class="student-list" id="student-list-{{ $lopHocPhan->ma_lop }}">
                            @if(is_array(json_decode($lopHocPhan->sinh_vien_mssv)))
                                @foreach (json_decode($lopHocPhan->sinh_vien_mssv) as $index => $mssv)
                                    <span class="student-item {{ $index >= 3 ? 'd-none' : '' }}">
                                        {{ $mssv }}<br>
                                    </span>
                                @endforeach
                            @endif
                        </div>
                        @if(is_array(json_decode($lopHocPhan->sinh_vien_mssv)) && count(json_decode($lopHocPhan->sinh_vien_mssv)) > 3)
                            <a href="#" class="toggle-students btn btn-sm btn-link" data-id="{{ $lopHocPhan->ma_lop }}"
                                onclick="toggleStudents('{{ $lopHocPhan->ma_lop }}')">
                                <i class="fa fa-eye"></i> Hiện thêm
                            </a>
                        @endif
                    </td>
                    <td>{{ $lopHocPhan->monHoc->ten_mon }}</td>
                    <td>{{ $lopHocPhan->khoa->ten_khoa }}</td>
                    <td>
                        <a href="{{ route('lop_hoc_phan.chi_tiet', $lopHocPhan->ma_lop) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-info-circle"></i> Chi Tiết
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('lop_hoc_phan.diem_danh', $lopHocPhan->ma_lop) }}" class="btn btn-success btn-sm">
                            <i class="fa fa-check-circle"></i> Điểm Danh
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $lopHocPhans->links('pagination::bootstrap-4') }}
    </div>
</div>
<style>
.table th, .table td {
    vertical-align: middle;
    text-align: center;
    white-space: nowrap;/* Ngăn chặn ngắt dòng */
}
</style>
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

    // Thêm chức năng tìm kiếm
    document.getElementById('searchInput').addEventListener('keyup', function() {
        var searchValue = this.value.toLowerCase();
        var classList = document.getElementById('classList').getElementsByTagName('tr');

        for (var i = 0; i < classList.length; i++) {
            var maLop = classList[i].getElementsByTagName('td')[0].textContent.toLowerCase();
            var tenLop = classList[i].getElementsByTagName('td')[1].textContent.toLowerCase();
            if (maLop.includes(searchValue) || tenLop.includes(searchValue)) {
                classList[i].style.display = '';
            } else {
                classList[i].style.display = 'none';
            }
        }
    });
</script>
@endsection
