@extends('admin.trang-chu')
@section('content')
<div class="container">
    <h1>Danh sách Trợ lý Khoa</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Ảnh đại diện</th>
                <th>Email</th>
                <th>Khoa</th>
                <th>Mật khẩu</th>
                <th>Số Điện Thoại</th>
                <th>Lần Đăng Nhập Cuối</th>
            </tr>
        </thead>
        <tbody>
            @foreach($troLyKhoas as $tlk)
                <tr>
                    <td>{{ $tlk->ho_ten }}</td>
                    <td></td>
                    <td>{{ $tlk->email }}</td>
                    <td>{{ $tlk->khoa->ten_khoa }}</td> 
                    <td>
                        <span class="password-field" id="password-{{ $tlk->mat_khau }}"
                            onclick="togglePassword('{{ $tlk->mat_khau }}', '{{ $tlk->mat_khau }}')">
                            {{ substr($tlk->mat_khau, 0, 8) }}...
                        </span>
                    </td>
                    <td>{{ $tlk->sdt }}</td>
                    <td>{{ $tlk->thoi_gian_dang_nhap_cuoi }}</td>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function togglePassword(id, password) {
        var passwordField = document.getElementById('password-' + id);
        if (passwordField.innerText === password) {
            passwordField.innerText = password.substring(0, 8) + '...';
        } else {
            passwordField.innerText = password;
        }
    }
</script>
@endsection