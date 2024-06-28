@extends('giao_vien.trang-chu')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row"> 
                <div class="col-sm-8">
                    <h1 class="card-title">Danh Sách Điểm Danh</h1>
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('diem-danh-ngoai.them') }}">
                        <button class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i> THÊM
                        </button>
                    </a>
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('diem-danh-ngoai.quet_ma_qr') }}">
                        <button class="btn btn-success btn-round ms-auto">
                            <i class="fa fa-qrcode"></i> QUÉT MÃ QR
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã ĐIỂM DANH</th>
                            <th>MÃ QR</th>
                            <th>GIÁO VIÊN</th>
                            <th>THỜI GIAN QR</th>
                            <th>NGÀY</th>
                            <th>SỐ LƯỢNG</th>
                            <th>THAO TÁC</th>
                            <th>QUÉT MÃ QR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diemdanhngoais as $diemdanhngoai)
                            <tr>
                                <td>{{ $diemdanhngoai->ma_diem_danh }}</td>
                                <td>
                                    <img src="data:image/png;base64,{{ $diemdanhngoai->ma_qr }}" alt="QR Code">
                                </td>
                                <td>{{ $diemdanhngoai->giao_vien_email }}</td>
                                <td>{{ $diemdanhngoai->thoi_gian_qr }}</td>
                                <td>{{ $diemdanhngoai->ngay }}</td>
                                <td>{{ $diemdanhngoai->so_luong }}</td>
                                <td>
                                    <div class="form-button-action">
                                        <a href="#" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-link btn-success btn-lg" onclick="openQrScanner('{{ $diemdanhngoai->ma_qr }}')" data-bs-toggle="tooltip" data-original-title="Quét Mã QR">
                                        <i class="fa fa-qrcode"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-right">
                {{ $diemdanhngoais->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<!-- Modal for QR Code Scanner -->
<div class="modal fade" id="qrScannerModal" tabindex="-1" role="dialog" aria-labelledby="qrScannerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrScannerModalLabel">Quét Mã QR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="qr-code-img" src="" alt="QR Code" style="width: 100%;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function openQrScanner(qrCodeData) {
        // Set the QR code image source
        document.getElementById('qr-code-img').src = 'data:image/png;base64,' + qrCodeData;
        
        // Show the modal
        $('#qrScannerModal').modal('show');
    }
</script>
@endsection
