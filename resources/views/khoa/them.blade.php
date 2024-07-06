@extends('admin.trang-chu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Thêm Khoa Đào Tạo</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('khoa.xu_ly_them') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="ten_khoa" class="form-label">Tên Khoa</label>
                    <input type="text" class="form-control" id="ten_khoa" name="ten_khoa" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>
@endsection
