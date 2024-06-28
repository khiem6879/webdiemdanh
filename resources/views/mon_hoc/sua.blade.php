@extends('admin.trang-chu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Sửa Môn Học</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('mon_hoc.xu_ly_sua', $monHoc->ma_mon) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="ten_mon" class="form-label">Tên Môn</label>
                    <input type="text" class="form-control @error('ten_mon') is-invalid @enderror" id="ten_mon" name="ten_mon"  required>
                   
                </div>
                
                <div class="mb-3">
                    <label for="khoa_id" class="form-label">Khoa</label>
                    <select class="form-control @error('khoa_id') is-invalid @enderror" id="khoa_id" name="khoa_id" required>
                        @foreach($khoas as $khoa)
                            <option value="{{ $khoa->khoa_id }}" >{{ $khoa->ten_khoa }}</option>
                        @endforeach
                    </select>
                   
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
