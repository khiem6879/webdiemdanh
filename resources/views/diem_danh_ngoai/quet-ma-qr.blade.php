@extends('giao_vien.trang-chu')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Quét Mã QR</h1>
        </div>
        <div class="card-body">
            <div id="qr-reader" style="width: 500px;"></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Xử lý khi quét thành công
        console.log(`Mã QR: ${decodedText}`, decodedResult);
        // Bạn có thể thêm logic để gửi mã QR đến server hoặc xử lý khác
        alert(`Quét thành công: ${decodedText}`);
    }

    function onScanFailure(error) {
        // Xử lý khi quét thất bại
        console.warn(`Mã QR lỗi: ${error}`);
    }

    let html5QrCode = new Html5Qrcode("qr-reader");
    html5QrCode.start(
        { facingMode: "environment" }, // Camera sau
        {
            fps: 10, // Số khung hình mỗi giây
            qrbox: { width: 250, height: 250 } // Kích thước hộp quét QR
        },
        onScanSuccess,
        onScanFailure
    ).catch(err => {
        console.error(`Không thể khởi động quét mã QR: ${err}`);
    });
</script>
@endsection
