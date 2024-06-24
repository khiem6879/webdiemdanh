@extends('giaovien.trang-chu')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row"> 
                <div class="col-sm-3">
                    <h1 class="card-title">Danh Sách Khoa</h1>
                </div>
                <div class="col-sm-6">
                    <input type="text" id="search" class="form-control" placeholder="Tìm kiếm khoa..." value="{{ request()->query('search') }}">
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('khoa.them') }}">
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
                            <th>ID Khoa</th>
                            <th>Tên Khoa</th>
                            <th style="width: 10%">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody id="khoa-table">
                        @if ($khoas->count() > 0)
                            @foreach ($khoas as $khoa)
                                <tr>
                                    <td>{{ $khoa->khoa_id }}</td>
                                    <td>{{ $khoa->ten_khoa }}</td>
                                    <td>
                                            <div class="form-button-action">
                                                    <a href="{{ route('khoa.cap_nhat', $khoa->khoa_id) }}" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form >
                                                        <button type="submit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></button>
                                                    </form>
                                            </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">Không tồn tại khoa</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-right">
                {{ $khoas->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
<style>
.table th, .table td {
    vertical-align: middle;
    text-align: center;
    white-space: nowrap; /* Ngăn chặn ngắt dòng */
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function toggleDepartmentVisibility(id) {
        // Here you could toggle visibility or any other attribute of a department row
    }

    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('khoa.tim_kiem') }}",
                type: "GET",
                data: {'search': query},
                success: function(data) {
                    $('#khoa-table').html(data);
                }
            });
        });
    });
</script>
@endsection
