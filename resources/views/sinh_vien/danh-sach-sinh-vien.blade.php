@extends($layout)
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row"> 
                <div class="col-sm-3">
                    <h1 class="card-title">Danh Sách Sinh Viên</h1>
                </div>
                <div class="col-sm-6">
                    <input type="text" id="search" class="form-control" placeholder="Tìm kiếm sinh viên..." value="{{ request()->query('search') }}">
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('sinh_vien.them') }}">
                        <button class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i> THÊM
                        </button>
                    </a>
                </div>
            </div>
        </div>
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
                            <th>MẬT KHẨU</th>
                            <th>ĐỊA CHỈ</th>
                            <th style="width: 10%">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody id="sinhvien-table">
                        @if ($sinhviens->count() > 0)
                            @foreach ($sinhviens as $sinhvien)
                                <tr>
                                    <td>{{ $sinhvien->ma_sinh_vien }}</td>
                                    <td>{{ $sinhvien->ho_ten }}</td>
                                    <td>{{ $sinhvien->ngay_sinh }}</td>
                                    <td>{{ $sinhvien->so_dien_thoai }}</td>
                                    <td>{{ $sinhvien->so_cccd }}</td>
                                    <td>{{ $sinhvien->email }}</td>
                                    <td>
                                        <span class="password-field" id="password-{{ $sinhvien->ma_sinh_vien }}"
                                            onclick="togglePassword('{{ $sinhvien->ma_sinh_vien }}', '{{ $sinhvien->mat_khau }}')">
                                            {{ substr($sinhvien->mat_khau, 0, 8) }}...
                                        </span>
                                    </td>
                                    <td>{{ $sinhvien->dia_chi }}</td>
                                    <td>
                                    <div class="form-button-action">
                                        <a href="{{ route('sinh_vien.cap_nhat', $sinhvien->ma_sinh_vien) }}" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('sinh_vien.xoa', $sinhvien->ma_sinh_vien) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></button>
                                        </form>
                                    </div>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9">Không tồn tại sinh viên</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-right">
                {{ $sinhviens->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>



        </div>
    </div>
</div>
<style>
.table th, .table td {
    vertical-align: middle;
    text-align: center;
    white-space: nowrap;/* Ngăn chặn ngắt dòng */
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function togglePassword(id, password) {
        var passwordField = document.getElementById('password-' + id);
        if (passwordField.innerText === password) {
            passwordField.innerText = password.substring(0, 8) + '...';
        } else {
            passwordField.innerText = password;
        }
    }

    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('sinh_vien.tim_kiem') }}",
                type: "GET",
                data: {'search': query},
                success: function(data) {
                    $('#sinhvien-table').html(data);
                }
            });z
        });
    });
</script>
@endsection
