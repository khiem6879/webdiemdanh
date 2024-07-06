@extends('admin.trang-chu')
@section('content')
<div class="container">
    <h1>Thêm mới Trợ lý Khoa</h1>
    @if ($errors->any())
        
    @endif
    <form action="{{ route('tro_ly_khoa.xu_ly_them') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ho_ten">Họ tên</label>
            <input type="text" name="ho_ten" class="form-control @error('ho_ten') is-invalid @enderror" value="{{ old('ho_ten') }}" required>
            @error('ho_ten')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
<<<<<<< HEAD
            <label for="mat_khau">Mật khẩu</label>
            <input type="password" name="mat_khau" class="form-control @error('mat_khau') is-invalid @enderror" required>
            @error('mat_khau')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
=======
>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02
            <label for="khoa_id">Khoa đào tạo</label>
            <select name="khoa_id" class="form-control @error('khoa_id') is-invalid @enderror" required>
                @foreach ($khoas as $khoa)
                    <option value="{{ $khoa->khoa_id }}">{{ $khoa->ten_khoa }}</option>
                @endforeach
            </select>
            @error('khoa_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="so_dien_thoai">Số điện thoại</label>
            <input type="text" name="so_dien_thoai" class="form-control @error('so_dien_thoai') is-invalid @enderror" value="{{ old('so_dien_thoai') }}" required>
            @error('so_dien_thoai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="avt">Ảnh đại diện</label>
            <input type="file" name="avt" class="form-control @error('avt') is-invalid @enderror">
            @error('avt')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
</div>
@endsection
