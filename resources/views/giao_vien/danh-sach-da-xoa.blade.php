@extends($layout)

@section('content')
    <div class="container">
        <h1>Danh sách giáo viên đã bị xóa</h1>
        @if (session('thong_bao'))
            <div class="alert alert-success">
                {{ session('thong_bao') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($giaoviens as $giaovien)
                    <tr>
                        <td>{{ $giaovien->email }}</td>
                        <td>{{ $giaovien->ho_ten }}</td>
                        <td>{{ $giaovien->ngay_sinh }}</td>
                        <td>{{ $giaovien->so_dien_thoai }}</td>
                        <td>
                            <a href="{{ route('giao_vien.khoi_phuc', $giaovien->email) }}" class="btn btn-success">Khôi phục</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $giaoviens->links() }}
    </div>
@endsection
