@extends('layouts.app')
@section('module', 'Chỉnh Sửa')
@section('action', 'Gian Hàng')
@section('content')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#quote'
    });
    tinymce.init({
        selector: 'textarea#summary'
    });
    tinymce.init({
        selector: 'textarea#description'
    });

</script>
<div class="col-xl-12">
    <form action="{{ route('admin.vendor.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="p-4">
            <div class="row gx-5">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6">
                    <div class="card custom-card shadow-none mb-0 border-0">
                        <div class="card-header">
                            <div class="card-title">
                                Vui lòng điền hết để chỉnh sửa thông tin  nhé !
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-xl-6">
                                    <label for="contact-address-phone" class="form-label">Tên Gian
                                        Hàng:</label>
                                    <div class="input-group">

                                        <input value="{{$user->name}}" type="text" name="name" class="form-control form-control-light" id="contact-address-phone" placeholder="Tên Gian Hàng...">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <label for="contact-mail-message" class="form-label">Thông tin
                                        :</label>
                                    <div class="input-group">
                                        <textarea class="form-control form-control-light" name="short_bio" id="contact-mail-message" rows="2">{{$user->short_bio}}</textarea>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <label for="contact-mail-message" class="form-label">Địa Chỉ
                                        :</label>
                                    <div class="input-group">
                                        <textarea class="form-control form-control-light" name="address" id="contact-mail-message" rows="2">{{$user->address}}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <label for="contact-address-firstname" class="form-label">Tên
                                        Nhân Viên
                                        :</label>
                                    <div class="input-group">
                                        <input value="{{$user->first_name}}" type="text" name="first_name" class="form-control form-control-light" id="contact-address-firstname" placeholder="Điền Tên Nhân Viên">
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <label for="" class="form-label">Họ
                                        Nhân Viên
                                        :</label>
                                    <div class="input-group">
                                        <input value="{{$user->last_name}}" type="text" name="last_name" class="form-control form-control-light" id="" placeholder="Điền Họ Nhân Viên">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <label for="contact-mail-message" class="form-label">Ngày Sinh
                                        :</label>
                                    <div class="input-group">
                                        <input value="{{$user->birthday}}" type="date" class="form-control form-control-light" name="birthday" id="contact-mail-message" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <label for="contact-mail-message" class="form-label">Số điện thoại
                                        :</label>
                                    <div class="input-group">
                                        <input value="{{$user->phone}}" type="text" class="form-control form-control-light" name="phone" id="contact-mail-message" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <label for="1" class="form-label">Link FB
                                        :</label>
                                    <div class="input-group">
                                        <input value="{{$user->link_fb}}" type="text" name="link_fb" class="form-control form-control-light" id="1" placeholder="Điền Link Nếu Có">
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <label for="2" class="form-label">Link Zalo
                                        :</label>
                                    <div class="input-group">
                                        <input value="{{$user->link_zalo}}" type="text" name="link_zalo" class="form-control form-control-light" id="2" placeholder="Điền Link Nếu Có">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <label for="4" class="form-label">Email:</label>
                                    <div class="input-group">

                                        <input value="{{$user->email}}" type="text" name="email" class="form-control form-control-light" id="4" placeholder="Email...">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <label for="signup-password" class="form-label text-default">Mật
                                        Khẩu:</label>
                                    <div class="input-group">
                                        <input value="{{$user->password}}" type="password" name="password" class="form-control form-control-lg" id="signup-password" placeholder="Mật Khẩu">
                                        <button class="btn btn-light" onclick="createpassword('signup-password',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <label for="signup-confirmpassword" class="form-label text-default">Xác Nhận Mật
                                        Khẩu:</label>
                                    <div class="input-group">
                                        <input value="{{$user->password}}" type="password" class="form-control form-control-lg" id="signup-confirmpassword" placeholder="Xác nhận mật khẩu" name="password">
                                        <button class="btn btn-light" onclick="createpassword('signup-confirmpassword',this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>

                                </div>

                                <div class="col-xl-12">
                                    <div class="mb-3">

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card custom-card">

                                                    <label for="" class="form-label text-default"> Hình Đại
                                                        Diện Shop:</label>

                                                    <div class="card-body dropzone" ondragover="allowDrop(event)" ondrop="drop(event)" onclick="triggerInputFile()">
                                                        <input type="file" class="single-fileupload" name="user_image" accept="image/png, image/jpeg, image/gif" style="display: none;" onchange="handleFileChange(this)">

                                                        <img id="previewImage" src="#" alt="Image Preview" style="display:none; max-width:100%;">
                                                        <p>Kéo & thả để chọn hình <label for="images">Tìm kiếm</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                        Bằng cách tạo tài khoản bạn sẽ đồng ý các điều khoản của chúng
                                        tôi. <a href="terms-conditions.html" class="text-success"><u>Terms &
                                                Conditions</u></a> and <a class="text-success"><u>Privacy
                                                Policy</u></a>
                                    </label>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <button type="submit" style="width:100%" class="btn btn-primary-light btn-wave">Thay đổi Gian
                                        Hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
