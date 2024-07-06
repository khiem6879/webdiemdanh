<<<<<<< HEAD
@extends('admin.trang-chu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Thêm Sinh Viên</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('sinh_vien.xu_ly_them') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="ma_sinh_vien">Mã Sinh Viên</label>
                            <input type="text" name="ma_sinh_vien" class="form-control @error('ma_sinh_vien') is-invalid @enderror" value="{{ old('ma_sinh_vien') }}">
                            @error('ma_sinh_vien')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="ho_ten">Họ Tên</label>
                            <input type="text" name="ho_ten" class="form-control @error('ho_ten') is-invalid @enderror" value="{{ old('ho_ten') }}">
                            @error('ho_ten')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="ngay_sinh">Ngày Sinh</label>
                            <input type="date" name="ngay_sinh" class="form-control @error('ngay_sinh') is-invalid @enderror" value="{{ old('ngay_sinh') }}">
                            @error('ngay_sinh')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="dia_chi">Địa Chỉ</label>
                            <input type="text" name="dia_chi" class="form-control @error('dia_chi') is-invalid @enderror" value="{{ old('dia_chi') }}">
                            @error('dia_chi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="so_cccd">Số CCCD</label>
                            <input type="text" name="so_cccd" class="form-control @error('so_cccd') is-invalid @enderror" value="{{ old('so_cccd') }}">
                            @error('so_cccd')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="so_dien_thoai">Số Điện Thoại</label>
                            <input type="text" name="so_dien_thoai" class="form-control @error('so_dien_thoai') is-invalid @enderror" value="{{ old('so_dien_thoai') }}">
                            @error('so_dien_thoai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="mat_khau">Mật Khẩu</label>
                            <input type="password" name="mat_khau" class="form-control @error('mat_khau') is-invalid @enderror">
                            @error('mat_khau')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="dia_chi">Địa Chỉ</label>
                            <input type="text" name="dia_chi" class="form-control @error('dia_chi') is-invalid @enderror" value="{{ old('dia_chi') }}">
                            @error('dia_chi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
=======
@extends($layout)

@section('content')

<div class="mb-3">
    <button class="btn btn-primary" onclick="showForm('manualForm')">Thêm Sinh Viên</button>
    <button class="btn btn-primary" onclick="showForm('excelForm')">Thêm từ File Excel</button>
</div>

<div id="manualForm" style="display: block;">
    <form action="{{ route('sinh_vien.xu_ly_them') }}" method="POST">
        @csrf
        <!-- Form thêm sinh viên thủ công -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">MSSV</label>
                    <input name="ma_sinh_vien" type="text" class="form-control" placeholder="MSSV" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">Họ tên</label>
                    <input name="ho_ten" type="text" class="form-control" placeholder="Họ tên" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">Ngày sinh</label>
                    <input name="ngay_sinh" type="date" class="form-control" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <input name="dia_chi" type="text" class="form-control" placeholder="Địa chỉ" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">Số CCCD</label>
                    <input name="so_cccd" type="text" class="form-control" placeholder="Số CCCD" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" placeholder="Email" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input name="so_dien_thoai" type="text" class="form-control" placeholder="Số điện thoại" required />
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Thêm Sinh Viên</button>
        </div>
    </form>
</div>
<div id="excelForm" style="display: none;">
    <form action="{{ route('sinh_vien.upload_excel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <p style="color: red;">File danh sách sinh viên cột ngày sinh phải được định dạng là dd/mm/yyyy, các cột còn lại là text và định dạng file xlsx,xls .</p>
            <label class="form-label">Upload File Excel Sinh Viên</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <a href="{{ asset('storage/file_mau/danh-sach-sinh-vien.xlsx') }}" class="btn btn-info">Tải File Mẫu</a>
        <button type="submit" class="btn btn-primary">Thêm Sinh Viên từ File Excel</button>
    </form>
</div>

@if(session('thong_bao'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Kết quả',
            html: '{!! session('thong_bao') !!}'
        });
    </script>
@endif

<script>
    function showForm(formId) {
        document.getElementById('manualForm').style.display = 'none';
        document.getElementById('excelForm').style.display = 'none';
        document.getElementById(formId).style.display = 'block';
    }
</script>
@endsection
>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02
