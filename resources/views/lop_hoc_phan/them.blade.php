@extends($layout)
@section('content')
<div class="container">
    <h1>Thêm Lớp Học Phần</h1>
    <form action="{{ route('lop_hoc_phan.xu_ly_them') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ma_lop">Mã Lớp</label>
                    <input type="text" class="form-control" id="ma_lop" name="ma_lop" value="{{ $uniqueMaLop }}" readonly required>
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
            <input type="text" class="form-control" id="search_gv" placeholder="Tìm kiếm giáo viên">
            <div class="row equal-height">
                <div class="col-md-6">
                    <select multiple class="form-control" id="giao_vien_all">
                        @foreach ($giaoViens as $giaoVien)
                            <option value="{{ $giaoVien->email }}">{{ $giaoVien->email }} - {{ $giaoVien->ho_ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <select multiple class="form-control" id="giao_vien_selected" name="giao_vien[]"></select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="filter_lop">Lọc theo lớp</label>
            <select class="form-control" id="filter_lop">
                <option value="">Chọn lớp</option>
                @foreach ($lopHocs as $lopHoc)
                    <option value="{{ $lopHoc->ten_lop }}">{{ $lopHoc->ten_lop }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="sinh_vien">Sinh Viên</label>
            <input type="text" class="form-control" id="search_sv" placeholder="Tìm kiếm sinh viên">
            <div class="row equal-height">
                <div class="col-md-6">
                    <select multiple class="form-control" id="sinh_vien_all">
                        @foreach ($sinhVienDetails as $sinhVien)
                            <option value="{{ $sinhVien['ma_sinh_vien'] }}" data-lop="{{ $sinhVien['lop'] }}">{{ $sinhVien['ma_sinh_vien'] }} - {{ $sinhVien['ho_ten'] }} ({{ $sinhVien['lop'] }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <select multiple class="form-control" id="sinh_vien_selected" name="sinh_vien[]"></select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="ma_mon">Môn Học</label>
            <select class="form-control" id="ma_mon" name="ma_mon" required>
                @foreach ($monHocs as $monHoc)
                    <option value="{{ $monHoc->ma_mon }}">{{ $monHoc->ma_mon }} - {{ $monHoc->ten_mon }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="khoa">Khoa</label>
            @php
                $khoa = App\Models\KhoaDaoTao::find(session('khoa_id'));
            @endphp
            @if ($khoa)
                <input type="hidden" id="khoa_id" name="khoa_id" value="{{ $khoa->khoa_id }}">
                <input type="text" class="form-control" id="khoa" name="khoa" value="{{ $khoa->ten_khoa }}" readonly>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tìm kiếm và lọc giáo viên
        document.getElementById('search_gv').addEventListener('input', function () {
            let filter = this.value.toLowerCase();
            let options = document.getElementById('giao_vien_all').options;
            for (let i = 0; i < options.length; i++) {
                let text = options[i].text.toLowerCase();
                options[i].style.display = text.includes(filter) ? '' : 'none';
            }
        });

        // Chuyển giáo viên từ khung tất cả sang khung được chọn
        document.getElementById('giao_vien_all').addEventListener('dblclick', function () {
            let selectedOptions = Array.from(this.selectedOptions);
            let selectedContainer = document.getElementById('giao_vien_selected');
            selectedOptions.forEach(option => {
                this.removeChild(option);
                selectedContainer.appendChild(option);
            });
        });

        // Xóa giáo viên khỏi khung được chọn
        document.getElementById('giao_vien_selected').addEventListener('dblclick', function () {
            let selectedOptions = Array.from(this.selectedOptions);
            let allContainer = document.getElementById('giao_vien_all');
            selectedOptions.forEach(option => {
                this.removeChild(option);
                allContainer.appendChild(option);
            });
        });

        // Tìm kiếm và lọc sinh viên
        document.getElementById('search_sv').addEventListener('input', function () {
            let filter = this.value.toLowerCase();
            let options = document.getElementById('sinh_vien_all').options;
            for (let i = 0; i < options.length; i++) {
                let text = options[i].text.toLowerCase();
                options[i].style.display = text.includes(filter) ? '' : 'none';
            }
        });

        // Lọc sinh viên theo lớp
        document.getElementById('filter_lop').addEventListener('input', function () {
            let filter = this.value.toLowerCase();
            let options = document.getElementById('sinh_vien_all').options;
            for (let i = 0; i < options.length; i++) {
                let lop = options[i].getAttribute('data-lop').toLowerCase();
                options[i].style.display = lop.includes(filter) ? '' : 'none';
            }
        });

        // Chuyển sinh viên từ khung tất cả sang khung được chọn
        document.getElementById('sinh_vien_all').addEventListener('dblclick', function () {
            let selectedOptions = Array.from(this.selectedOptions);
            let selectedContainer = document.getElementById('sinh_vien_selected');
            selectedOptions.forEach(option => {
                this.removeChild(option);
                selectedContainer.appendChild(option);
            });
        });

        // Xóa sinh viên khỏi khung được chọn
        document.getElementById('sinh_vien_selected').addEventListener('dblclick', function () {
            let selectedOptions = Array.from(this.selectedOptions);
            let allContainer = document.getElementById('sinh_vien_all');
            selectedOptions.forEach(option => {
                this.removeChild(option);
                allContainer.appendChild(option);
            });
        });

        // Đồng bộ hóa các sinh viên đã chọn trước khi gửi biểu mẫu
        document.querySelector('form').addEventListener('submit', function () {
            let selectedContainer = document.getElementById('sinh_vien_selected');
            for (let i = 0; i < selectedContainer.options.length; i++) {
                selectedContainer.options[i].selected = true;
            }
        });
    });
</script>

<style>
    .equal-height {
        display: flex;
        align-items: stretch;
    }

    .equal-height .col-md-4,
    .equal-height .col-md-8 {
        display: flex;
        flex-direction: column;
    }

    #sinh_vien_all,
    #sinh_vien_selected,
    #giao_vien_all,
    #giao_vien_selected {
        flex: 1;
    }
</style>
@endsection
