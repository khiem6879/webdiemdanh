@extends($layout)

@section('content')
<div class="container">
    <h1>Đổi Mật Khẩu</h1>
    <form action="{{ route('tai_khoan.cap_nhat_mat_khau') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="current_password">Mật Khẩu Hiện Tại</label>
            <input type="password" name="mat_khau" id="mat_khau" class="form-control" required>
            @error('mat_khau')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="new_password">Mật Khẩu Mới</label>
            <input type="password" name="mat_khau_moi" id="mat_khau_moi" class="form-control" required>
            @error('mat_khau_moi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Xác Nhận Mật Khẩu Mới</label>
            <input type="password" name="mat_khau_moi_confirmation" id="mat_khau_moi_confirmation" class="form-control" required>
            @error('mat_khau_moi_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-key"></i> Đổi Mật Khẩu
            </button>
        </div>
    </form>
</div>
@endsection
