@extends($layout)
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
        <td>
        <span class="password-field" id="password-{{ $giaovien->email }}"
          onclick="togglePassword('{{ $giaovien->email }}', '{{ $giaovien->mat_khau }}')">
          {{ substr($giaovien->mat_khau, 0, 8) }}...
        </span>
        </td>
        <td>{{ $giaovien->khoa->ten_khoa }}</td>
        <td>{{ $giaovien->ngay_sinh}}</td>
        <td>{{ $giaovien->so_dien_thoai}}</td>
        <td>{{ $giaovien->so_cccd}}</td>
        <td>{{ $giaovien->dia_chi }}</td>
      </tr>
    @endforeach
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-right">
    {{ $giaoviens->appends(request()->query())->links('pagination::bootstrap-4') }}
  </div>
</div>

<style>
  .table th,
  .table td {
    vertical-align: middle;
    text-align: center;
    white-space: nowrap;
    /* Ngăn chặn ngắt dòng */
  }
</style>
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