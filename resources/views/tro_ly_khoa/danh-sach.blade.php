@extends($layout)
@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-3">
                    <h1 class="card-title">Danh sách Trợ lý Khoa</h1>
                </div>
                <div class="col-sm-6">
                    <input type="text" id="search" class="form-control" placeholder="Tìm kiếm trợ lý khoa..."
                        value="{{ request()->query('search') }}">
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('tro_ly_khoa.them') }}">
                        <button class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i> THÊM
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ảnh đại diện</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Khoa đào tạo</th>
                            <th>Mật khẩu</th>
                            <th>Số điện thoại</th>
                            <th>Đăng nhập gần nhất</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="trolykhoa-table">
                        @if ($trolykhoas->count() > 0)
                            @foreach($trolykhoas as $tlk)
                                <tr>
                                    <td><img src="{{ asset('storage/' . $tlk->avt) }}" alt="Ảnh đại diện" width="50"
                                            height="50"></td>
                                    <td>{{ $tlk->ho_ten }}</td>
                                    <td>{{ $tlk->email }}</td>
                                    <td>{{ $tlk->khoa->ten_khoa }}</td>
                                    <td>
                                        <span class="password-field" id="password-{{ $tlk->id }}"
                                            onclick="togglePassword('{{ $tlk->id }}', '{{ $tlk->mat_khau }}')">
                                            {{ substr($tlk->mat_khau, 0, 8) }}...
                                        </span>
                                    </td>
                                    <td>{{ $tlk->so_dien_thoai }}</td>
                                    <td>
                    {{ $tlk->thoi_gian_dang_nhap_cuoi ? Carbon::parse($tlk->thoi_gian_dang_nhap_cuoi)->setTimezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s') : 'Chưa đăng nhập' }}
                </td>
                                    <td>
                                        <a href="{{ route('tro_ly_khoa.sua', $tlk->email) }}"
                                            class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip"
                                            data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('tro_ly_khoa.xoa', $tlk->email) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa môn học này không?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-bs-toggle="tooltip" title="Xóa"
                                                class="btn btn-link btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">Không tồn tại Trợ lý Khoa</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-right">
                {{ $trolykhoas->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
<style>
    .table th,
    .table td {
        vertical-align: middle;
        text-align: center;
        white-space: nowrap;
    }
</style>
<script>
    function togglePassword(id, password) {
        var passwordField = document.getElementById('password-' + id);
        if (passwordField.innerText === password) {
            passwordField.innerText = password.substring(0, 8) + '...';
        } else {
            passwordField.innerText = password;
        }
    }

    $(document).ready(function () {
        $('#search').on('keyup', function () {
            var query = $(this).val();
            $.ajax({
                url: ,
                type: "GET",
                data: { 'search': query },
                success: function (data) {
                    $('#trolykhoa-table').html(data);
                }
            });
        });
    });
</script>

@endsection