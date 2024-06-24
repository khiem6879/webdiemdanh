<!-- resources/views/tai_khoan/thong_tin_tai_khoan.blade.php -->
@extends($layout)

@section('content')
<div class="container">
    <h1>Thông Tin Tài Khoản</h1>
    <table class="table">
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <!-- Các trường dữ liệu riêng cho từng loại tài khoản -->
        @if($role === 'sinh_vien')
            <tr>
                <th>MSSV</th>
                <td>{{ $user->ma_sinh_vien }}</td>
            </tr>
            <tr>
                <th>Họ Tên</th>
                <td>{{ $user->ho_ten }}</td>
            </tr>
            <tr>
                <th>CCCD</th>
                <td>{{ $user->so_cccd }}</td>
            </tr>
            <tr>
                <th>Số Điện Thoại</th>
                <td>{{ $user->so_dien_thoai }}</td>
            </tr>
            <tr>
                <th>Ngày Sinh</th>
                <td>{{ $user->ngay_sinh }}</td>
            </tr>
            <tr>
                <th>Địa Chỉ</th>
                <td>{{ $user->dia_chi }}</td>
            </tr>
        @elseif($role === 'giao_vien')
            <tr>
                <th>Họ Tên</th>
                <td>{{ $user->ho_ten }}</td>
            </tr>
            <tr>
                <th>Số Điện Thoại</th>
                <td>{{ $user->so_dien_thoai }}</td>
            </tr>
            <tr>
                <th>Ngày Sinh</th>
                <td>{{ $user->ngay_sinh }}</td>
            </tr>
            <tr>
                <th>Địa Chỉ</th>
                <td>{{ $user->dia_chi }}</td>
            </tr>
            <tr>
                <th>CCCD</th>
                <td>{{ $user->so_cccd }}</td>
            </tr>
            <tr>
                <th>Khoa</th>
                <td>{{ $user->khoa->ten_khoa }}</td>
            </tr>

        @elseif($role === 'admin')
            <tr>
                <th>Vai Trò</th>
                <td>Quản Trị Viên</td>
            </tr>
        @elseif($role === 'tro_ly_khoa')
        <tr>
                <th>Số Điện Thoại</th>
                <td>{{ $user->so_dien_thoai }}</td>
            </tr>
            <tr>
                <th>Họ Tên</th>
                <td>{{ $user->ho_ten }}</td>
            </tr>
            <tr>
                <th>Khoa</th>
                <td>{{ $user->khoa->ten_khoa }}</td>
            </tr>
        @endif
        <!-- Thêm các trường dữ liệu khác nếu cần -->
    </table>
    <a href="{{ route('tai_khoan.sua') }}" class="btn btn-primary">
        <i class="fas fa-edit"></i> Chỉnh Sửa Thông Tin
    </a>
    <a href="{{ route('tai_khoan.doi_mat_khau') }}" class="btn btn-secondary">
        <i class="fas fa-key"></i> Đổi Mật Khẩu
    </a>
</div>
@if (session('thong_bao'))
        <script>Swal.fire("{{ session('thong_bao') }}")</script>
@endif
@endsection