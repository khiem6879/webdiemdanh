@extends($layout)

@section('content')
<div class="container">
    <h1>Xác Nhận Mã</h1>
    <form action="{{ route('tai_khoan.xac_nhan_ma') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Mã Xác Nhận</label>
            <input type="text" name="code" id="code" class="form-control" required>
            @error('code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-check"></i> Xác Nhận
            </button>
        </div>
    </form>
</div>
@endsection
