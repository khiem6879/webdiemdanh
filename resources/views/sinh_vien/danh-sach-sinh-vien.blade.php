

@extends('sinh_vien.trang-chu')

@section('content')

    
   
    <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h1 class="card-title">Danh Sách Sinh Viên</h1>
                      <a
                        
                        href="{{ route('sinh_vien.them') }}"
                        
                        

                      >
                      <button class="btn btn-primary btn-round ms-auto">
                      <i class="fa fa-plus"></i>
                         
                        THÊM


</button>
                       
</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Modal -->
                    <div
                      class="modal fade"
                      id="addRowModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> New</span>
                              <span class="fw-light"> Row </span>
                            </h5>
                            <button
                              type="button"
                              class="close"
                              data-dismiss="modal"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="small">
                              Create a new row using this form, make sure you
                              fill them all
                            </p>
                            <form>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input
                                      id="addName"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill name"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6 pe-0">
                                  <div class="form-group form-group-default">
                                    <label>Position</label>
                                    <input
                                      id="addPosition"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill position"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                    <label>Office</label>
                                    <input
                                      id="addOffice"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill office"
                                    />
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer border-0">
                            <button
                              type="button"
                              id="addRowButton"
                              class="btn btn-primary"
                            >
                              Add
                            </button>
                            <button
                              type="button"
                              class="btn btn-danger"
                              data-dismiss="modal"
                            >
                              Close
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                      <thead>
                          <tr>
                            <th>MSSV</th>
                            <th>HỌ TÊN</th>
                            <th>NGÀY SINH</th>
                            <th>SỐ ĐIỆN THOẠI</th>
                            <th>CCCD</th>
                            <th>EMAIL</th>
                            <th>MẬT KHẨU</th>
                            <th>ĐỊA CHỈ</th>
                            <th style="width: 10%">THAO TÁC</th>
                          </tr>
                        </thead>

                        <tfoot>
                        <tr>
                           <th>Mssv</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th>Cccd</th>
                            <th>Email</th>
                            <th>Mật khẩu</th>
                            <th>Địa chỉ</th>
                            <th style="width: 10%">Thao tác</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          
                        @foreach ($sinhviens as $sinhvien)
    <tr>
        <td>{{ $sinhvien->ma_sinh_vien }}</td>
        <td>{{ $sinhvien->ho_ten }}</td>
        <td>{{ $sinhvien->ngay_sinh}}</td>
        <td>{{ $sinhvien->so_dien_thoai}}</td>
        <td>{{ $sinhvien->so_cccd}}</td>
        <td>{{ $sinhvien->email }}</td>
        <td>{{ $sinhvien->mat_khau }}</td>
        <td>{{ $sinhvien->dia_chi }}</td>
        <td>
            <div class="form-button-action">
                <a href="{{ route('sinh_vien.cap_nhat', $sinhvien->ma_sinh_vien) }}" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" data-original-title="Edit Task">
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
