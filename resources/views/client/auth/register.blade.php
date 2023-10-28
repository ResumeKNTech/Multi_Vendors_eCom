<!DOCTYPE html>

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="PHP Bootstrap Responsive Admin Web Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="dashboard, template dashboard, Bootstrap dashboard, admin panel template, sales dashboard, Bootstrap admin panel, stocks dashboard, crm admin dashboard, ecommerce admin panel, admin template, admin panel dashboard, course dashboard, template ecommerce website, dashboard hrm, admin dashboard">

    <!-- TITLE -->
    <title>Đăng Ký</title>

    <!-- FAVICON -->
    <link rel="icon" href="https://php.spruko.com/ynex/ynex/assets/images/brand-logos/favicon.ico"
        type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('admin/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">

    <!-- STYLES CSS -->
    <link href="{{ asset('admin/assets/css/styles.css') }}" rel="stylesheet">

    <!-- MAIN JS -->
    <script src="{{ asset('admin/assets/js/authentication-main.js') }}"></script>
</head>

<body>

    <div class="container-lg">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-5 d-flex justify-content-center">
                    <a href="index.html">
                        <img src="{{ asset('admin/assets/images/brand-logos/desktop-logo.png') }}" alt="logo"
                            class="desktop-logo">
                        <img src="{{ asset('admin/assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                            class="desktop-dark">
                    </a>
                </div>
                <div class="card custom-card">
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">Đăng Ký</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Chào bạn ! Hãy Đăng Ký Để Đến Với Thương
                            Hiệu Chúng Tôi</p>
                        <div class="row gy-3">
                            <form action="{{ route('client.register') }}" method="post">
                                @csrf
                                <div class="col-xl-12">
                                    <label for="signup-firstname" class="form-label text-default">UserName</label>
                                    <input type="text" class="form-control form-control-lg" name="name" id="signup-firstname"
                                        placeholder="Vui lòng nhập tên người dùng">
                                </div>
                                <div class="col-xl-12">
                                    <label for="signup-firstname" class="form-label text-default">Tên</label>
                                    <input type="text" class="form-control form-control-lg" name="first_name" id="signup-firstname"
                                        placeholder="Vui lòng nhập Tên">
                                </div>
                                <div class="col-xl-12">
                                    <label for="signup-lastname" class="form-label text-default">Họ</label>
                                    <input type="text" class="form-control form-control-lg" name="last_name" id="signup-lastname"
                                        placeholder="Vui lòng nhập Họ">
                                </div>
                                <div class="col-xl-12">
                                    <label for="email" class="form-label text-default">Email</label>
                                    <input type="text" class="form-control form-control-lg" name="email" id="email"
                                        placeholder="Vui lòng nhập Họ">
                                </div>
                                <div class="col-xl-12">
                                    <label for="signup-password" class="form-label text-default">Mật Khẩu</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control form-control-lg" id="signup-password"
                                            placeholder="Mật Khẩu">
                                        <button class="btn btn-light" onclick="createpassword('signup-password',this)"
                                            type="button" id="button-addon2"><i
                                                class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="signup-confirmpassword" class="form-label text-default">Xác Nhận Mật
                                        Khẩu</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg"
                                            id="signup-confirmpassword" placeholder="Xác nhận mật khẩu"  name="password">
                                        <button class="btn btn-light"
                                            onclick="createpassword('signup-confirmpassword',this)" type="button"
                                            id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="defaultCheck1">
                                        <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                            Bằng cách tạo tài khoản bạn sẽ đồng ý các điều khoản của chúng tôi. <a
                                                href="terms-conditions.html" class="text-success"><u>Terms &
                                                    Conditions</u></a> and <a class="text-success"><u>Privacy
                                                    Policy</u></a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Tạo tài khoản</button>
                                </div>
                            </form>
                        </div>
                        <div class="text-center">
                            <p class="fs-12 text-muted mt-3">Bạn đã có tài khoản? <a
                                    href="{{ route('client.login') }}" class="text-primary">Đăng Nhập</a></p>
                        </div>
                        <div class="text-center my-3 authentication-barrier">
                            <span>OR</span>
                        </div>
                        <div class="btn-list text-center">
                            <button class="btn btn-icon btn-light">
                                <i class="ri-facebook-line fw-bold text-dark op-7"></i>
                            </button>
                            <button class="btn btn-icon btn-light">
                                <i class="ri-google-line fw-bold text-dark op-7"></i>
                            </button>
                            <button class="btn btn-icon btn-light">
                                <i class="ri-twitter-line fw-bold text-dark op-7"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- SCRIPTS -->

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('admin/assets/js/show-password.js') }}"></script>

    <!-- END SCRIPTS -->

</body>

<!-- Mirrored from php.spruko.com/ynex/ynex/pages/signup-basic.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Oct 2023 21:06:21 GMT -->

</html>
<!-- This code use for render base file -->
