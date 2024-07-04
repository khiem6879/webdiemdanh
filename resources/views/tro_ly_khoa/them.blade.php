@extends('admin.trang-chu')
@section('content')
<div class="container">
    <h1>Thêm mới Trợ lý Khoa</h1>
    <form action="{{ route('tro_ly_khoa.xu_ly_them') }}" method="POST" >
        @csrf
        <div class="form-group">
            <label for="ho_ten">Họ tên</label>
            <input type="text" name="ho_ten" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="khoa_id">Khoa đào tạo</label>
            <select name="khoa_id" class="form-control" required>
                @foreach ($khoas as $khoa)
                    <option value="{{ $khoa->khoa_id }}">{{ $khoa->ten_khoa }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="so_dien_thoai">Số điện thoại</label>
            <input type="text" name="so_dien_thoai" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="avt">Ảnh đại diện</label>
            <input type="file" name="avt" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
</div>
@endsection
