@extends('admin.trang-chu')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Danh Sách Môn Học Đã Bị Xóa</h1>
        </div>
        <div class="card-body">
            @if (session('thong_bao'))
                <div class="alert alert-success">
                    {{ session('thong_bao') }}
                </div>
            @endif
            <div class="table-responsive">
                <table id="deleted-subjects" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã Môn</th>
                            <th>Tên Môn</th>
                            <th>Khoa</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($monhocs as $monhoc)
                        <tr>
                            <td>{{ $monhoc->ma_mon }}</td>
                            <td>{{ $monhoc->ten_mon }}</td>
                            <td>{{ $monhoc->khoa->ten_khoa }}</td>
                            <td>
                                <a href="{{ route('mon_hoc.khoi_phuc', $monhoc->ma_mon) }}" class="btn btn-success" data-bs-toggle="tooltip" data-original-title="Khôi phục">
                                  Khôi phục
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-right">
                {{ $monhocs->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.table th, .table td {
    vertical-align: middle;
    text-align: center;
    white-space: nowrap;
}
</style>
