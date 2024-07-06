@extends('admin.trang-chu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Sửa Khoa Đào Tạo</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('khoa.xu_ly_sua', $khoa->khoa_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="ten_khoa" class="form-label">Tên Khoa</label>
                    <input type="text" class="form-control" id="ten_khoa" name="ten_khoa" value="{{ $khoa->ten_khoa }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
