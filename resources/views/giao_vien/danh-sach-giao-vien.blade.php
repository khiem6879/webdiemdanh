

@extends('giao_vien.trang-chu')

@section('content')
    <div class="col-md-12">
                    <div class="table-responsive">
                      <table id="add-row" class="display table table-striped table-hover">
                      <thead>
                          <tr>
                            <th>HỌ TÊN</th>
                            <th>EMAIL</th>
                            <th>MẬT KHẨU</th>
                            <th>KHOA</th>
                            <th>NGÀY SINH</th>
                            <th>SỐ ĐIỆN THOẠI</th>
                            <th>CCCD</th>
                            <th>ĐỊA CHỈ</th>
                            <th style="width: 10%">THAO TÁC</th>
                          </tr>
                      </thead>
                      <tbody>  
                          @foreach ($giaoviens as $giaovien)
                      <tr>
                          <td>{{ $giaovien->ho_ten }}</td>
                          <td>{{ $giaovien->email }}</td>
                          <td>{{ $giaovien->mat_khau }}</td>
                          <td>{{ $giaovien->khoa_id }}</td>
                          <td>{{ $giaovien->ngay_sinh}}</td>
                          <td>{{ $giaovien->so_dien_thoai}}</td>
                          <td>{{ $giaovien->cccd}}</td>
                          <td>{{ $giaovien->dia_chi }}</td>
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
                  </div>
                </div>
              </div>
             
           
    

@endsection
