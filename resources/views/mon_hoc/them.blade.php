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
                    <input type="text" class="form-control" id="ten_mon" name="ten_mon" required>
                </div>
                
                <div class="mb-3">
                    <label for="khoa_id" class="form-label">Khoa</label>
                    <select class="form-control" id="khoa_id" name="khoa_id" required>
                        @foreach($khoas as $khoa)
                            <option value="{{ $khoa->khoa_id }}">{{ $khoa->ten_khoa }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>
@endsection
