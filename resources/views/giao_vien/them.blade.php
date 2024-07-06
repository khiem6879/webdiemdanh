@extends('admin.trang-chu')

@section('content')
<<<<<<< HEAD
<form action="{{ route('giao_vien.xu_ly_them') }}" method="POST" >
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Họ tên</label>
                <input name="ho_ten" type="text" class="form-control @error('ho_ten') is-invalid @enderror" placeholder="Họ tên" value="{{ old('ho_ten') }}"  />
                @error('ho_ten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}"  />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Mật khẩu</label>
                <input name="mat_khau" type="password" class="form-control @error('mat_khau') is-invalid @enderror" placeholder="Mật khẩu"  />
                @error('mat_khau')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Khoa</label>
                <select name="khoa_id" class="form-control @error('khoa_id') is-invalid @enderror">
                    @foreach ($khoas as $khoa)
                        <option value="{{ $khoa->khoa_id }}">{{ $khoa->ten_khoa }}</option>
                    @endforeach
                </select>
                @error('khoa_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Ngày sinh</label>
                <input name="ngay_sinh" type="date" class="form-control @error('ngay_sinh') is-invalid @enderror" value="{{ old('ngay_sinh') }}"  />
                @error('ngay_sinh')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Số điện thoại</label>
                <input name="so_dien_thoai" type="text" class="form-control @error('so_dien_thoai') is-invalid @enderror" placeholder="Số điện thoại" value="{{ old('so_dien_thoai') }}" />
                @error('so_dien_thoai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">CCCD</label>
                <input name="so_cccd" type="text" class="form-control @error('so_cccd') is-invalid @enderror" placeholder="CCCD" value="{{ old('so_cccd') }}" />
                @error('so_cccd')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Địa chỉ</label>
                <input name="dia_chi" type="text" class="form-control @error('dia_chi') is-invalid @enderror" placeholder="Địa chỉ" value="{{ old('dia_chi') }}"  />
                @error('dia_chi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="modal-footer border-0">
        <button type="submit" class="btn btn-primary">Thêm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
    </div>
</form>
=======

<div class="mb-3">
    <button class="btn btn-primary" onclick="showTeacherForm('manualTeacherForm')">Thêm Giáo Viên</button>
    <button class="btn btn-primary" onclick="showTeacherForm('excelTeacherForm')">Thêm từ File Excel</button>
</div>

<div id="manualTeacherForm" style="display: blocl;">
    <form action="{{ route('giao_vien.xu_ly_them') }}" method="POST">
        @csrf
        <!-- Form thêm giáo viên thủ công -->
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">Họ tên</label>
                    <input name="ho_ten" type="text" class="form-control" placeholder="Họ tên" required />
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
                    <label class="form-label">Khoa</label>
                    <select name="khoa_id" class="form-control">
                        @foreach ($khoas as $khoa)
                            <option value="{{ $khoa->khoa_id }}">{{ $khoa->ten_khoa }}</option>
                        @endforeach
                    </select>
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
                    <label class="form-label">Số điện thoại</label>
                    <input name="so_dien_thoai" type="text" class="form-control" placeholder="Số điện thoại" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">CCCD</label>
                    <input name="so_cccd" type="text" class="form-control" placeholder="CCCD" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <input name="dia_chi" type="text" class="form-control" placeholder="Địa chỉ" required />
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Giáo Viên</button>
    </form>
</div>

<div id="excelTeacherForm" style="display: none;">
    <form action="{{ route('giao_vien.upload_excel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <p style="color: red;">File danh sách giáo viên cột ngày sinh phải được định dạng là dd/mm/yyyy, các cột còn lại là text, định dạng file xlsx,xls và khoa_id xem trong file khoa đao tạo</p>
            <label class="form-label">Upload File Excel Giáo Viên</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Giáo Viên từ File Excel</button>
        <a href="{{ asset('storage/file_mau/danh-sach-giao-vien.xlsx') }}" class="btn btn-info">Tải File Mẫu Giáo Viên</a>
<a href="{{ asset('storage/file_mau/khoa-dao-tao.xlsx') }}" class="btn btn-info">Tải File Mẫu Khoa Đào Tạo</a>

       
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
    function showTeacherForm(formId) {
        document.getElementById('manualTeacherForm').style.display = 'none';
        document.getElementById('excelTeacherForm').style.display = 'none';
        document.getElementById(formId).style.display = 'block';
    }
</script>
>>>>>>> badd37a6bcfa5c671b1ddd5787c452806d30cb02
@endsection
