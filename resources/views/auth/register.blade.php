<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="PHP Bootstrap Responsive Admin Web Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="dashboard, template dashboard, Bootstrap dashboard, admin panel template, sales dashboard, Bootstrap admin panel, stocks dashboard, crm admin dashboard, ecommerce admin panel, admin template, admin panel dashboard, course dashboard, template ecommerce website, dashboard hrm, admin dashboard">
    <!-- TITLE -->
    <title>Đăng Ký Gian Hàng</title>
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
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <!-- NODE WAVES CSS -->
    <link href="{{ asset('admin/assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">
    <!-- SIMPLEBAR CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/simplebar/simplebar.min.css') }}">
    <!-- COLOR PICKER CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/%40simonwep/pickr/themes/nano.min.css') }}">
    <!-- CHOICES CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">
    <!-- CHOICES JS -->
    <script src="{{ asset('admin/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <!-- MAIN JS -->
    <script src="{{ asset('admin/assets/js/authentication-main.js') }}"></script>


    <style>
        .dropzone {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            position: relative;
        }

        .dropzone:hover {
            background-color: #f8f8f8;
        }

        .single-fileupload {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .single-fileupload+label {
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- LOADER -->
    <div id="loader">
        <img src="https://php.spruko.com/ynex/ynex/assets/images/media/loader.svg" alt="">
    </div>
    <!-- END LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="main-content">


            <div class="container-fluid">



                <!-- Start::row-1 -->
                <div class="row justify-content-center">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-xm-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body p-0">
                                <div class="contact-page-banner">
                                    <div class="text-center">
                                        <h3 class="fw-semibold text-fixed-white">Đăng Ký Gian Hàng!</h3>
                                        <h6 class="text-fixed-white mb-4 px-sm-0 px-3">Chào mừng các gian hàng đến
                                            với sàn thương mại chúng tôi. </h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                        <form action="{{ route('auth.register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xxl-12 col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                    <div class="card custom-card contactus-form overflow-hidden">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Vui lòng điền hết để dăng ký gian hàng nhé !
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row gy-3">
                                                <div class="col-xl-6">
                                                    <label for="contact-address-phone" class="form-label">Tên Gian
                                                        Hàng:</label>
                                                    <div class="input-group">

                                                        <input type="text" name="name"
                                                            class="form-control form-control-light"
                                                            id="contact-address-phone" placeholder="Tên Gian Hàng...">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="contact-mail-message" class="form-label">Thông tin
                                                        :</label>
                                                    <div class="input-group">
                                                        <textarea class="form-control form-control-light" name="short_bio" id="contact-mail-message" rows="2"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="contact-mail-message" class="form-label">Địa Chỉ
                                                        :</label>
                                                    <div class="input-group">
                                                        <textarea class="form-control form-control-light" name="address" id="contact-mail-message" rows="2"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xl-3">
                                                    <label for="contact-address-firstname" class="form-label">Tên
                                                        Nhân Viên
                                                        :</label>
                                                    <div class="input-group">
                                                        <input type="text" name="first_name"
                                                            class="form-control form-control-light"
                                                            id="contact-address-firstname"
                                                            placeholder="Điền Tên Nhân Viên">
                                                    </div>
                                                </div>
                                                <div class="col-xl-3">
                                                    <label for="" class="form-label">Họ
                                                        Nhân Viên
                                                        :</label>
                                                    <div class="input-group">
                                                        <input type="text" name="last_name"
                                                            class="form-control form-control-light"
                                                            id=""
                                                            placeholder="Điền Họ Nhân Viên">
                                                    </div>
                                                </div>

                                               <div class="col-xl-6">
                                                    <label for="contact-mail-message" class="form-label">Ngày Sinh
                                                        :</label>
                                                    <div class="input-group">
                                                        <input type="date"  class="form-control form-control-light" name="birthday" id="contact-mail-message" rows="2"></textarea>
                                                    </div>
                                                </div><div class="col-xl-6">
                                                    <label for="contact-mail-message" class="form-label">Số điện thoại
                                                        :</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-light" name="phone" id="contact-mail-message" rows="2"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3">
                                                    <label for="1" class="form-label">Link FB
                                                        :</label>
                                                    <div class="input-group">
                                                        <input type="text" name="link_fb"
                                                            class="form-control form-control-light" id="1"
                                                            placeholder="Điền Link Nếu Có">
                                                    </div>
                                                </div>
                                                <div class="col-xl-3">
                                                    <label for="2" class="form-label">Link Zalo
                                                        :</label>
                                                    <div class="input-group">
                                                        <input type="text" name="link_zalo"
                                                            class="form-control form-control-light" id="2"
                                                            placeholder="Điền Link Nếu Có">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="4" class="form-label">Email:</label>
                                                    <div class="input-group">

                                                        <input type="text" name="email"
                                                            class="form-control form-control-light" id="4"
                                                            placeholder="Email...">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="signup-password" class="form-label text-default">Mật
                                                        Khẩu:</label>
                                                    <div class="input-group">
                                                        <input type="password" name="password"
                                                            class="form-control form-control-lg" id="signup-password"
                                                            placeholder="Mật Khẩu">
                                                        <button class="btn btn-light"
                                                            onclick="createpassword('signup-password',this)"
                                                            type="button" id="button-addon2"><i
                                                                class="ri-eye-off-line align-middle"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="signup-confirmpassword"
                                                        class="form-label text-default">Xác Nhận Mật
                                                        Khẩu:</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control form-control-lg"
                                                            id="signup-confirmpassword"
                                                            placeholder="Xác nhận mật khẩu" name="password">
                                                        <button class="btn btn-light"
                                                            onclick="createpassword('signup-confirmpassword',this)"
                                                            type="button" id="button-addon21"><i
                                                                class="ri-eye-off-line align-middle"></i></button>
                                                    </div>

                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="mb-3">

                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="card custom-card">

                                                                    <label for=""
                                                                        class="form-label text-default"> Hình Đại
                                                                        Diện Shop:</label>

                                                                    <div class="card-body dropzone"
                                                                        ondragover="allowDrop(event)"
                                                                        ondrop="drop(event)"
                                                                        onclick="triggerInputFile()">
                                                                        <input type="file"
                                                                            class="single-fileupload"
                                                                            name="user_image"
                                                                            accept="image/png, image/jpeg, image/gif"
                                                                            style="display: none;"
                                                                            onchange="handleFileChange(this)">

                                                                        <img id="previewImage" src="#"
                                                                            alt="Image Preview"
                                                                            style="display:none; max-width:100%;">
                                                                        <p>Kéo & thả để chọn hình <label
                                                                                for="images">Tìm kiếm</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1">
                                                    <label class="form-check-label text-muted fw-normal"
                                                        for="defaultCheck1">
                                                        Bằng cách tạo tài khoản bạn sẽ đồng ý các điều khoản của chúng
                                                        tôi. <a href="terms-conditions.html"
                                                            class="text-success"><u>Terms &
                                                                Conditions</u></a> and <a
                                                            class="text-success"><u>Privacy
                                                                Policy</u></a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-center">
                                                    <button type="submit" style="width:100%"
                                                        class="btn btn-primary-light btn-wave">Đăng Ký Gian
                                                        Hàng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <!--End::row-1 -->

            </div>


        </div>
        <!-- END MAIN-CONTENT -->



    </div>
    <!-- END PAGE-->

    <!-- FOOTER -->

    <footer class=" mt-auto py-3 bg-white text-center">
        <div class="container-fluid">
            <span class="text-muted"> Copyright © <span id="year"></span> <a href="javascript:void(0);"
                    class="text-dark fw-semibold">Ynex</a>.
                Designed with <span class="bi bi-heart-fill text-danger"></span> by <a href="javascript:void(0);">
                    <span class="fw-semibold text-primary text-decoration-underline">Spruko</span>
                </a> All
                rights
                reserved
            </span>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- SCRIPTS -->


    <!-- SCROLL-TO-TOP -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- POPPER JS -->
    <script src="{{ asset('admin/assets/libs/%40popperjs/core/umd/popper.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- NODE WAVES JS -->
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <!-- SIMPLEBAR JS -->
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/simplebar.js') }}"></script>
    <!-- COLOR PICKER JS -->
    <script src="{{ asset('admin/assets/libs/%40simonwep/pickr/pickr.es5.min.js') }}"></script>
    <!-- DEFAULTMENU JS -->
    <script src="{{ asset('admin/assets/js/defaultmenu.js') }}"></script>
    <!-- STICKY JS -->
    <script src="{{ asset('admin/assets/js/sticky.js') }}"></script>
    <!-- CUSTOM JS -->
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <!-- CUSTOM-SWITCHER JS -->
    <script src="{{ asset('admin/assets/js/custom-switcher.js') }}"></script>
    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('admin/assets/js/show-password.js') }}"></script>
    <script>
        function allowDrop(event) {
            event.preventDefault();
        }

        function triggerInputFile() {
            const input = document.querySelector('.single-fileupload');
            input.click();
        }


        function drop(event) {
            event.preventDefault();
            const file = event.dataTransfer.files[0];
            const input = document.querySelector('.single-fileupload');
            input.files = event.dataTransfer.files;
            previewImage(input);
        }

        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('previewImage');
                    img.src = e.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function handleFileChange(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('previewImage');
                    img.src = e.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <!-- END SCRIPTS -->
</body>

</html>
