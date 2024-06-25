@extends('tro_ly_khoa.trang-chu')
@section('content')
<div class="container">
    <h1>Thêm Lớp Học Phần</h1>
    <form action="{{ route('lop_hoc_phan.xu_ly_them') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ma_lop">Mã Lớp</label>
                    <input type="text" class="form-control" id="ma_lop" name="ma_lop" value="{{ $uniqueMaLop }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">    
                    <label for="ten_lop">Tên Lớp</label>
                    <input type="text" class="form-control" id="ten_lop" name="ten_lop" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="giao_vien">Giáo Viên</label>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" id="search_gv" placeholder="Tìm kiếm giáo viên">
                    <select multiple class="form-control" id="giao_vien_all">
                        @foreach ($giaoViens as $giaoVien)
                            <option value="{{ $giaoVien->email }}" data-khoa-id="{{ $giaoVien->khoa_id }}">{{ $giaoVien->ho_ten }} ({{ $giaoVien->email }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <select multiple class="form-control" id="giao_vien_selected" name="giao_vien[]">
                        <!-- Các giáo viên được chọn sẽ hiển thị ở đây -->
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="sinh_vien">Sinh Viên</label>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" id="search_sv" placeholder="Tìm kiếm sinh viên">
                    <select multiple class="form-control" id="sinh_vien_all">
                        @foreach ($sinhViens as $sinhVien)
                            <option value="{{ $sinhVien->ma_sinh_vien }}" data-lop-id="{{ $sinhVien->lop_id }}">{{ $sinhVien->ma_sinh_vien }} - {{ $sinhVien->ho_ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8">
                    <select multiple class="form-control" id="sinh_vien_selected" name="sinh_vien[]">
                        <!-- Các sinh viên được chọn sẽ hiển thị ở đây -->
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="khoa">Khoa</label>
            @php
                $khoa = App\Models\KhoaDaoTao::find(session('khoa_id'));
            @endphp
            @if ($khoa)
                <input type="hidden" id="khoa_id" name="khoa_id" value="{{ $khoa->id }}">
                <input type="text" class="form-control" id="khoa" name="khoa" value="{{ $khoa->ten_khoa }}" readonly>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tìm kiếm và lọc giáo viên
    document.getElementById('search_gv').addEventListener('input', function() {
        let filter = this.value.toLowerCase();
        let options = document.getElementById('giao_vien_all').options;
        for (let i = 0; i < options.length; i++) {
            let text = options[i].text.toLowerCase();
            options[i].style.display = text.includes(filter) ? '' : 'none';
        }
    });

    // Tìm kiếm và lọc sinh viên
    document.getElementById('search_sv').addEventListener('input', function() {
        let filter = this.value.toLowerCase();
        let options = document.getElementById('sinh_vien_all').options;
        for (let i = 0; i < options.length; i++) {
            let text = options[i].text.toLowerCase();
            options[i].style.display = text.includes(filter) ? '' : 'none';
        }
    });

    // Chuyển giáo viên từ khung tất cả sang khung được chọn
    document.getElementById('giao_vien_all').addEventListener('dblclick', function() {
        let selectedOptions = Array.from(this.selectedOptions);
        let selectedContainer = document.getElementById('giao_vien_selected');
        selectedOptions.forEach(option => {
            this.removeChild(option);
            selectedContainer.appendChild(option);
        });
    });

    // Chuyển sinh viên từ khung tất cả sang khung được chọn
    document.getElementById('sinh_vien_all').addEventListener('dblclick', function() {
        let selectedOptions = Array.from(this.selectedOptions);
        let selectedContainer = document.getElementById('sinh_vien_selected');
        selectedOptions.forEach(option => {
            this.removeChild(option);
            selectedContainer.appendChild(option);
        });
    });

    // Xóa giáo viên khỏi khung được chọn
    document.getElementById('giao_vien_selected').addEventListener('dblclick', function() {
        let selectedOptions = Array.from(this.selectedOptions);
        let allContainer = document.getElementById('giao_vien_all');
        selectedOptions.forEach(option => {
            this.removeChild(option);
            allContainer.appendChild(option);
        });
    });

    // Xóa sinh viên khỏi khung được chọn
    document.getElementById('sinh_vien_selected').addEventListener('dblclick', function() {
        let selectedOptions = Array.from(this.selectedOptions);
        let allContainer = document.getElementById('sinh_vien_all');
        selectedOptions.forEach(option => {
            this.removeChild(option);
            allContainer.appendChild(option);
        });
    });
});
</script>
@endsection
