@extends($layout)
@section('content')
<div class="container">
    <h1>Danh sách Điểm Danh</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Điểm Danh</th>
                <th>Lớp</th>
                <th>Mã QR</th>
                <th>Thời Gian QR</th>
                <th>Ngày</th>
                <th>Chỉnh Sửa</th>
                <th>Chi Tiết</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diemDanhs as $diemDanh)
                <tr>
                    <td>{{ $diemDanh->ma_diem_danh }}</td>
                    <td>{{ $diemDanh->lopHocPhan->ten_lop }}</td>
                    <td>
                        <img src="{{ asset('storage/qr_codes/' . $diemDanh->ma_qr) }}" alt="QR Code" style="width: 100px;">
                    </td>
                    <td>
                        <span id="countdown-{{ $diemDanh->ma_diem_danh }}"
                            data-expiry-time="{{ \Carbon\Carbon::parse($diemDanh->thoi_gian_qr)->timestamp }}"></span>
                    </td>
                    <td>{{ $diemDanh->ngay }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm"
                            onclick="editTime('{{ $diemDanh->ma_diem_danh }}', '{{ \Carbon\Carbon::parse($diemDanh->thoi_gian_qr)->diffInMinutes() }}')">Chỉnh
                            Sửa</button>
                    </td>
                    <td>
                        <a href="{{ route('lop_hoc_phan.chi_tiet_diem_danh', $diemDanh->ma_diem_danh) }}" class="btn btn-info btn-sm">Chi Tiết</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $diemDanhs->links('pagination::bootstrap-4') }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editTimeModal" tabindex="-1" aria-labelledby="editTimeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('lop_hoc_phan.chinh_sua_thoi_gian') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editTimeModalLabel">Chỉnh Sửa Thời Gian QR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ma_diem_danh" id="maDiemDanhInput">
                    <div class="form-group">
                        <label for="thoiGianQrInput">Thời Gian QR (phút)</label>
                        <input type="number" class="form-control" name="thoi_gian_qr" id="thoiGianQrInput" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="redirectToList()">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function editTime(maDiemDanh, thoiGianQr) {
        document.getElementById('maDiemDanhInput').value = maDiemDanh;
        document.getElementById('thoiGianQrInput').value = thoiGianQr;
        $('#editTimeModal').modal('show');
    }


    document.addEventListener('DOMContentLoaded', function () {
        @foreach ($diemDanhs as $diemDanh)
            startCountdown('countdown-{{ $diemDanh->ma_diem_danh }}');
        @endforeach
    });

    function startCountdown(elementId) {
        const countdownElement = document.getElementById(elementId);
        const expiryTime = countdownElement.getAttribute('data-expiry-time') * 1000;

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = expiryTime - now;
            // console.log("Expiry Time:", expiryTime);
            // console.log("Current Time:", now);
            // console.log("Distance:", distance);

            if (distance < 0) {
                countdownElement.innerHTML = 'Hết hạn';
                return;
            }

            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownElement.innerHTML = minutes + ' phút ' + seconds + ' giây';
            setTimeout(updateCountdown, 1000);
        }

        updateCountdown();
    }

    function redirectToList() {
        window.location.href = "{{ route('lop_hoc_phan.danh_sach_diem_danh') }}";
    }
</script>
<style>
.table th, .table td {
    vertical-align: middle;
    text-align: center;
    white-space: nowrap;/* Ngăn chặn ngắt dòng */
}
</style>
@endsection
