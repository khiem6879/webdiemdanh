@extends($layout)
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row"> 
                <div class="col-sm-3">
                    <h1 class="card-title">Danh Sách Khoa</h1>
                </div>
                <div class="col-sm-2">
                    
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
@endsection
