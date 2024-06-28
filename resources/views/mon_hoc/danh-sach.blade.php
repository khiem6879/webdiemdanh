@extends('admin.trang-chu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row"> 
                <div class="col-sm-3">
                    <h1 class="card-title">Danh sách môn học</h1>
                </div>
                <div class="col-sm-6">
                    <input type="text" id="search" class="form-control" placeholder="Tìm kiếm môn học..." value="{{ request()->query('search') }}">
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('mon_hoc.them') }}">
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
                            <th>Mã môn</th>
                            <th>Tên môn</th>
                           
                            <th>Khoa đào tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="monhoc-table">
                        @if ($monhocs->count() > 0)
                            @foreach($monhocs as $monHoc)
                                <tr>
                                    <td>{{ $monHoc->ma_mon }}</td>
                                    <td>{{ $monHoc->ten_mon }}</td>
                                  
                                    <td>{{ $monHoc->khoa->ten_khoa }}</td>
                                    <td>
                                        <a  href="{{ route('mon_hoc.sua',  $monHoc->ma_mon) }} "class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" data-original-title="Edit Task">
                                       
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <form  action="{{ route('mon_hoc.xoa', $monHoc->ma_mon) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-bs-toggle="tooltip" title="Xóa" class="btn btn-link btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">Không tồn tại môn học</td>
                            </tr>
                        @endif
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
