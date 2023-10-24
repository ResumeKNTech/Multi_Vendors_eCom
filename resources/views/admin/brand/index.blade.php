@extends('layouts.app')
@section('module', 'Thương Hiệu')
@section('action', 'Danh Sách')
@section('content')
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
    <div class="col-xl-4">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Thương Hiệu
                </div>

            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Tên Thương Hiệu</label>
                        <input type="text" name="brand_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Tình Trạng</label>
                        <select class="form-control" data-trigger name="is_featured" id="choices-single-groups">
                            <option value="">Vui lòng chọn</option>
                            <option value="public">Public</option>
                            <option value="cancel">Cancel</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Trạng Thái</label>
                        <select class="form-control" data-trigger name="status">
                            <option value="">Vui lòng chọn</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Logo:</label>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Single Upload
                                            </div>
                                        </div>
                                        <div class="card-body dropzone" ondragover="allowDrop(event)" ondrop="drop(event)"
                                            onclick="triggerInputFile()">
                                            <input type="file" class="single-fileupload" name="logo_images"
                                                accept="image/png, image/jpeg, image/gif" style="display: none;"
                                                onchange="handleFileChange(this)">

                                            <img id="previewImage" src="#" alt="Image Preview"
                                                style="display:none; max-width:100%;">
                                            <p>Drag & Drop your image or <label for="logo_images">Browse</label></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" style="width:100%" class="btn btn-primary">Thêm</button>
                </form>
            </div>

        </div>
    </div>
    <div class="col-xl-8">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Danh Sách
                </div>
            </div>
            <div class="card-body">
                <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap w-100">
                    <thead>
                        <tr>

                            <th>Tên Logo</th>
                            <th>Logo</th>
                            <th>Tình Trạng</th>
                            <th>Trạng Thái</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $i)
                            <tr>
                                <td>

                                    {{ $i->brand_name }}
                                </td>
                                <td><img width="90" height="90" src="{{ asset($i->logo_images) }}" /></td>

                                <td>{{ $i->is_featured }}</td>
                                <td>{{ $i->status }}</td>

                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                class="ri-download-2-line"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info"><i
                                                class="ri-edit-line"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
@endsection
