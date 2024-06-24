@extends('giao_vien.trang-chu')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row"> 
                <div class="col-sm-10">
                    <h1 class="card-title">Danh Sách Điểm Danh</h1>
                </div>
                <div class="col-sm-2">
                    <a >
                        <button class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i> THÊM
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
                            <th style="width: 10%">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diemdanhngoais as $diemdanhngoai)
                            <tr>
                                <td>{{ $diemdanhngoai->ma_diem_danh}}</td>
                                <td>{{ $diemdanhngoai->ma_qr }}</td>
                                <td>{{ $diemdanhngoai->giao_vien_email }}</td>
                                <td>{{ $diemdanhngoai->thoi_gian_qr }}</td>
                                <td>{{ $diemdanhngoai->ngay }}</td>
                                <td>{{ $diemdanhngoai->so_luong }}</td>
                                
                                <td>
                                    <div class="form-button-action">
                                        <a  class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
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
@endsection
