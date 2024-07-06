@extends($layout)
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row"> 
                <div class="col-sm-3">
                    <h1 class="card-title">Danh Sách Giáo Viên</h1>
                </div>
                <div class="col-sm-5">
                    <input type="text" id="search" class="form-control" placeholder="Tìm kiếm giáo viên..." value="{{ request()->query('search') }}">
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('giao_vien.them') }}">
                        <button class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i> THÊM
                        </button>
                    </a>
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('giao_vien.danh_sach_da_xoa') }}">
                        <button class="btn btn-secondary btn-round ms-auto">
                            <i class="fa fa-trash"></i> ĐÃ XÓA
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
                            <th>HỌ TÊN</th>
                            <th>EMAIL</th>
                            <th>KHOA</th>
                            <th>NGÀY SINH</th>
                            <th>SỐ ĐIỆN THOẠI</th>
                            <th>CCCD</th>
                            <th>ĐỊA CHỈ</th>
                            
                            <th style="width: 10%">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>  
                        @foreach ($giaoviens as $giaovien)
                        <tr>
                            <td>{{ $giaovien->ho_ten }}</td>
                            <td>{{ $giaovien->email }}</td>
                            <td>{{ $giaovien->khoa->ten_khoa }}</td> 
                            <td>{{ $Carbon::parse($giaovien->ngay_sinh)->format('d-m-Y') }}</td>
                            <td>{{ $giaovien->so_dien_thoai }}</td>
                            <td>{{ $giaovien->so_cccd }}</td>
<<<<<<< HEAD
                            <td>{{ $giaovien->dia_chi }}</td>
                            
=======
>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02
                            <td>
                                <span class="short-address" id="address-{{ $giaovien->id }}" onclick="toggleAddress('{{ $giaovien->id }}', '{{ $giaovien->dia_chi }}')">
                                    {{ \Illuminate\Support\Str::limit($giaovien->dia_chi, 20, '...') }}
                                </span>
                            </td>
                            <td>
                                <div class="form-button-action">
                                    <a href="{{ route('giao_vien.sua', $giaovien->email) }}" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('giao_vien.xoa', $giaovien->email) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" title="Xóa" class="btn btn-link btn-danger">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-right">
                {{ $giaoviens->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
</div>
</div>

<style>
.table th, .table td {
    vertical-align: middle;
    text-align: center;
    white-space: nowrap; 
}
.short-address {
    cursor: pointer;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleAddress(id, fullAddress) {
        var addressElement = document.getElementById('address-' + id);
        var currentText = addressElement.innerText;

        if (currentText.endsWith('...')) {
            // Hiển thị địa chỉ đầy đủ
            addressElement.innerText = fullAddress;
        } else {
            // Rút gọn địa chỉ
            addressElement.innerText = fullAddress.substring(0, 20) + '...';
        }
    }
</script>
@endsection
