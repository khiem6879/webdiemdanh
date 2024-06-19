@extends('sinh_vien.trang-chu')

@section('content')
<div class="container">
  <h1>danh sách</h1>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Mã Điểm Danh</th>
          <th>Mã QR</th>
          <th>Email Giảng Viên</th>
          <th>Thời Gian QR</th>
          <th>Ngày</th>
          <th>Số Lượng</th>
          <th>Mật Khẩu</th>
          <th>Số CCCD</th>
          <th>Hành Động</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sinhviens as $sinhvien)
        <tr>
          <td>{{ $sinhvien->ma_sinh_vien }}</td>
          <td>{{ $sinhvien->ho_ten }}</td>
          <td>{{ $sinhvien->ngay_sinh }}</td>
          <td>{{ $sinhvien->so_dien_thoai }}</td>
          <td>{{ $sinhvien->so_cccd }}</td>
          <td>{{ $sinhvien->email }}</td>
          <td>
            <span class="password-field" id="password-{{ $sinhvien->ma_sinh_vien }}" onclick="togglePassword('{{ $sinhvien->ma_sinh_vien }}', '{{ $sinhvien->mat_khau }}')">
              {{ substr($sinhvien->mat_khau, 0, 8) }}...
            </span>
          </td>
          <td>{{ $sinhvien->dia_chi }}</td>
          <td>
            <div class="form-button-action">
              <a href="{{ route('sinh_vien.cap_nhat', $sinhvien->ma_sinh_vien) }}" class="btn btn-link btn-primary btn-lg"
                data-bs-toggle="tooltip" data-original-title="Edit Task">
                <i class="fa fa-edit"></i>
              </a>
              <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger"
                data-original-title="Remove">
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

<script>
function togglePassword(id, password) {
    var passwordField = document.getElementById('password-' + id);
    if (passwordField.innerText === password) {
        passwordField.innerText = password.substring(0, 8) + '...';
    } else {
        passwordField.innerText = password;
    }
}
</script>
@endsection
