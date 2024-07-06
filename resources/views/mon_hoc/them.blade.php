@extends('admin.trang-chu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Thêm Môn Học</h1>
        </div>
        <div class="card-body">
            
            <form action="{{ route('mon_hoc.xu_ly_them') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="ten_mon" class="form-label">Tên Môn</label>
                    <input type="text" class="form-control @error('ten_mon') is-invalid @enderror" id="ten_mon" name="ten_mon" value="{{ old('ten_mon') }}" required>
                    @error('ten_mon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="khoa_id" class="form-label">Khoa</label>
                    <select class="form-control @error('khoa_id') is-invalid @enderror" id="khoa_id" name="khoa_id" required>
                        @foreach($khoas as $khoa)
                            <option value="{{ $khoa->khoa_id }}" {{ old('khoa_id') == $khoa->khoa_id ? 'selected' : '' }}>{{ $khoa->ten_khoa }}</option>
                        @endforeach
                    </select>
                    @error('khoa_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>
@endsection
