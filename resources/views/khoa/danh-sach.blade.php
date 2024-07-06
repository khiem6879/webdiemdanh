<<<<<<< HEAD
@extends('admin.trang-chu')

=======
@extends($layout)
>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row"> 
                <div class="col-sm-9">
                    <h1 class="card-title">Danh Sách Khoa Đào Tạo</h1>
                </div>
                <div class="col-sm-3">
<<<<<<< HEAD
                    <div class="float-right">
                        <a href="{{ route('khoa.them') }}" class="btn btn-primary">Thêm</a>
                        <a href="{{ route('khoa.danh_sach_da_xoa') }}" class="btn btn-secondary">Danh sách đã xóa</a>
                    </div>
=======
                    <h1 class="card-title">Danh Sách Khoa</h1>
                </div>
                <div class="col-sm-2">
                    
>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02
                </div>
            </div>
        </div>
        <div class="card-body">
           
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Khoa</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
<<<<<<< HEAD
                    <tbody>
                        @forelse($khoadaotaos as $khoa)
=======
                    <tbody id="khoa-table">
                        @if ($khoas->count() > 0)
                            @foreach ($khoas as $khoa)
                                <tr>
                                    <td>{{ $khoa->khoa_id }}</td>
                                    <td>{{ $khoa->ten_khoa }}</td>
                                </tr>
                            @endforeach
                        @else
>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02
                            <tr>
                                <td>{{ $khoa->khoa_id }}</td>
                                <td>{{ $khoa->ten_khoa }}</td>
                                <td>
                                <div class="form-button-action">
                                    <a href="{{ route('khoa.sua', $khoa->khoa_id) }}" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" data-original-title="Edit Task">
                                         <i class="fa fa-edit"></i></a>
                                    <form action="{{ route('khoa.xoa', $khoa->khoa_id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link btn-danger">  <i class="fa fa-times"></i></button>
                                    </form>
                                </div>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Không có khoa nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
             <div class="d-flex justify-content-right">
                {{ $khoadaotaos->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======
<style>
.table th, .table td {
    vertical-align: middle;
    text-align: center;
    white-space: nowrap; /* Ngăn chặn ngắt dòng */
}
</style>
>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02
@endsection

