@extends('admin.trang-chu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Danh Sách Khoa Đào Tạo Đã Xóa</h1>
        </div>
        <div class="card-body">
            @if(session('thong_bao'))
                <div class="alert alert-success">
                    {{ session('thong_bao') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Khoa</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($khoadaotaos as $khoa)
                        <tr>
                            <td>{{ $khoa->khoa_id }}</td>
                            <td>{{ $khoa->ten_khoa }}</td>
                            <td>
                                <form action="{{ route('khoa.khoi_phuc', $khoa->khoa_id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Khôi Phục</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $khoadaotaos->links() }}
        </div>
    </div>
</div>
@endsection
