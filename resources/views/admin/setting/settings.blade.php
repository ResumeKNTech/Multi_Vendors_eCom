@extends('layouts.app')
@section('module', 'Cài Đặt')
@section('action', 'Cấu Hình')
@section('content')
<!-- Bootstrap CSS -->
<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#short_des'
    });
    tinymce.init({
        selector: 'textarea#description'
    });
    tinymce.init({
        selector: 'textarea#address'
    });
</script>
<style>
    #image-label {
        border: 2px dashed #ccc;
        padding: 10px;
        cursor: pointer;
    }

    #image-preview {
        margin-top: 10px;
    }

    img.preview-image {
        max-width: 100px;
        max-height: 100px;
        margin-right: 10px;
        margin-bottom: 10px;
    }

</style>
<div class="col-xl-12">
    <div class="card custom-card">
        <div class="card-body add-products p-0">
            <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-4">
                    <div class="row gx-5">
                        <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                            <div class="card custom-card shadow-none mb-0 border-0">
                                <div class="card-body p-0">
                                    <div class="row gy-3">

                                        <div class="col-xl-12">
                                            <label for="product-features" class="form-label">Mô tả Ngắn:</label>
                                            <textarea class="form-control" id="short_des" name="short_des" rows="3"></textarea>
                                        </div>
                                        <div class="col-xl-12">
                                            <label for="product-features" class="form-label">Mô Tả:</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>
                                        <div class="col-xl-12">
                                            <label for="product-features" class="form-label">Địa Chỉ:</label>
                                            <textarea class="form-control"  name="address" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                        <div class="card custom-card shadow-none mb-0 border-0">
                            <div class="card-body p-0">
                                <div class="row gy-4">

                                    <div class="col-xl-12">
                                        <div class="card custom-card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    Tải Hình
                                                </div>
                                            </div>
                                            <div class="card-body dropzone" ondragover="allowDrop1(event)" ondrop="drop1(event)" onclick="triggerInputFile1()">
                                                <input type="file" class="single-fileupload" name="photo" accept="image/png, image/jpeg, image/gif" style="display: none;" onchange="handleFileChange1(this)">

                                                <img id="previewImage" src="#" alt="Image Preview" style="display:none; max-width:100%;">
                                                <p>Kéo & thả để chọn hình <label for="images">Tìm kiếm</label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="card custom-card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    Tải Logo
                                                </div>
                                            </div>
                                            <div class="card-body dropzone" ondragover="allowDrop(event)" ondrop="drop(event)" onclick="triggerInputFile()">
                                                <input type="file" class="single-fileupload1" name="logo" accept="image/png, image/jpeg, image/gif" style="display: none;" onchange="handleFileChange(this)">

                                                <img id="previewImage1" src="#" alt="Image Preview" style="display:none; max-width:100%;">
                                                <p>Kéo & thả để chọn hình <label for="images">Tìm kiếm</label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="" class="form-label">Điện Thoại:</label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Điện Thoại...">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="" class="form-label">Email:</label>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
            <div class="form-group mb-3">
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-primary-light m-1">Cập Nhập<i class="bi bi-plus-lg ms-2"></i></button>
            </div>

        </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function allowDrop(event) {
        event.preventDefault();
    }

    function triggerInputFile() {
        const input = document.querySelector('.single-fileupload1');
        input.click();
    }


    function drop(event) {
        event.preventDefault();
        const file = event.dataTransfer.files[0];
        const input = document.querySelector('.single-fileupload1');
        input.files = event.dataTransfer.files;
        previewImage(input);
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('previewImage1');
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
                const img = document.getElementById('previewImage1');
                img.src = e.target.result;
                img.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<script>
    function allowDrop1(event) {
        event.preventDefault();
    }

    function triggerInputFile1() {
        const input = document.querySelector('.single-fileupload');
        input.click();
    }


    function drop1(event) {
        event.preventDefault();
        const file = event.dataTransfer.files[0];
        const input = document.querySelector('.single-fileupload');
        input.files = event.dataTransfer.files;
        previewImage(input);
    }

    function previewImage1(input) {
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

    function handleFileChange1(input) {
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




<script>
    const imagesGalleryInput = document.getElementById('images-gallery-input');
    const imagesGalleryLabel = document.getElementById('images-gallery-label');
    const imagesGalleryPreview = document.getElementById('images-gallery-preview');

    imagesGalleryInput.addEventListener('change', handleImagesGallerySelect);

    function handleImagesGallerySelect(e) {
        const files = e.target.files;
        imagesGalleryPreview.innerHTML = ''; // Clear current preview

        for (let i = 0; i < files.length; i++) {
            const file = files[i];

            if (file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.classList.add('preview-image');
                img.file = file;

                const reader = new FileReader();
                reader.onload = (function(aImg) {
                    return function(e) {
                        aImg.src = e.target.result;
                    };
                })(img);

                reader.readAsDataURL(file);

                imagesGalleryPreview.appendChild(img);
            }
        }
    }

    imagesGalleryPreview.addEventListener('click', handleImageDelete);

    function handleImageDelete(e) {
        if (e.target && e.target.tagName === 'IMG') {
            const img = e.target;
            img.parentNode.removeChild(img);
            // Note: You may also want to handle the removal from the input file list here.
        }
    }

</script>
<!-- DATE & TIME PICKER JS -->
<script src="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
@endsection
