<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Dang Ky</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="images/1.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                    Điểm Danh</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Cao Đẳng Kỹ Thuật Cao
                    Thắng</small>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-1">
                        <h4>Điền Đầy Đủ Thông Tin</h4>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="ho_ten"
                            placeholder="Họ Tên">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="gmail"
                            placeholder="Tên đăng nhập dạng Gmail">
                    </div>


                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" name="mat_khau" placeholder="Mật Khẩu">
                        <span class="toggle-password" onclick="togglePassword(this)">👁️</span>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" name="xac_nhan_mat_khau" placeholder="Xác Nhận Mật Khẩu">
                        <span class="toggle-password" onclick="togglePassword(this)">👁️</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control form-control-lg bg-light fs-6" name="ngay_sinh">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="so_dien_thoai" placeholder="Số Điện Thoại">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="ma_sinh_vien" placeholder="Mã Sinh Viên">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="lop" placeholder="Lớp">
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6">Đăng Ký</button>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-light w-100 fs-6"><img src="/images/google.png" style="width:20px"
                                class="me-2"><small>Đăng nhập với Google</small></button>
                    </div>
                    <div class="row">
                        <small>Bạn đã có tài khoản? <a href="{{route('DangNhap')}}">Đăng Nhập</a></small>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        function togglePassword(element) {
            var input = element.previousElementSibling;
            if (input.type === "password") {
                input.type = "text";
                element.textContent = "🔒";
            } else {
                input.type = "password";
                element.textContent = "👁️";
            }
        }
    </script>
</body>

</html>