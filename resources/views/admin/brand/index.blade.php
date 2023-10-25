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
                                                <p>Kéo & thả để chọn hình <label for="images">Tìm kiếm</label>
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
                                        <button class="btn btn-icon btn-sm btn-info editBrandBtn"
                                            data-id="{{ $i->id }}" data-name="{{ $i->brand_name }}"
                                            data-is_featured="{{ $i->is_featured }}" data-status="{{ $i->status }}"
                                            data-logo="{{ asset($i->logo_images) }}"><i class="ri-edit-line"></i></button>

                                        </button>

                                        <a href="#" class="btn btn-icon btn-sm btn-danger" onclick="confirmDelete('{{ route('admin.brand.destroy', $i->id) }}')"><i class="ri-delete-bin-6-line"></i></a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc chắn muốn xóa sản phẩm này không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <a id="confirmDeleteButton" href="#" class="btn btn-danger">Xóa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="editBrandModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="editBrandModalLabel">Chỉnh sửa thương hiệu</h5>


                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="mb-3">
                            <label for="edit_brand_name" class="form-label">Tên Thương Hiệu:</label>
                            <input type="text" name="brand_name" id="edit_brand_name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="edit_is_featured" class="form-label">Tình Trạng:</label>
                            <select class="form-control" name="is_featured" id="edit_is_featured">
                                <option value="">Vui lòng chọn</option>
                                <option value="public">Public</option>
                                <option value="cancel">Cancel</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="edit_status" class="form-label">Trạng Thái:</label>
                            <select class="form-control" name="status" id="edit_status">
                                <option value="">Vui lòng chọn</option>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="edit_logo_images" class="form-label">Logo:</label>
                            <div class="card custom-card">
                                <div class="card-body dropzone" ondragover="allowDrop(event)" ondrop="drop(event)"
                                    onclick="triggerEditInputFile()">
                                    <input type="file" class="single-fileupload1" name="logo_images"
                                        id="edit_logo_images" accept="image/png, image/jpeg, image/gif"
                                        style="display: none;" onchange="handleEditFileChange(this)">
                                    <img id="editPreviewImage" src="#" alt="Image Preview"
                                        style="display:none; max-width:100%;">
                                    <p>Kéo & thả để chọn hình hoặc <label for="edit_logo_images">Tìm kiếm</label></p>
                                </div>
                            </div>
                        </div>

                        <button type="submit" style="width:100%" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function confirmDelete(deleteUrl) {
            var confirmDeleteButton = document.getElementById("confirmDeleteButton");
            confirmDeleteButton.href = deleteUrl;

            var myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            myModal.show();
        }
    </script>
    <script>

        $(document).ready(function() {
            $('.editBrandBtn').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var is_featured = $(this).data('is_featured');
                var status = $(this).data('status');
                var logo = $(this).data('logo');

                // Sử dụng Blade để sinh ra URL, sau đó thay thế ':id' bằng giá trị thực tế
                var updateUrl = "{{ route('admin.brand.update', ['id' => ':id']) }}";
                updateUrl = updateUrl.replace(':id', id);

                $('#editForm').attr('action', updateUrl);

                $('#edit_brand_name').val(name);
                $('#edit_is_featured').val(is_featured);
                $('#edit_status').val(status);
                $('#editPreviewImage').attr('src', logo).show();

                $('#editBrandModal').modal('show');
            });
        });
    </script>
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

        function triggerEditInputFile() {
            const input = document.querySelector('.single-fileupload1');
            input.click();
        }

        function previewImageEdit(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('editPreviewImage');
                    img.src = e.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Hàm xử lý sự kiện thay đổi tệp trong modal chỉnh sửa
        function handleEditFileChange(input) {
            previewImageEdit(input);
        }
    </script>
@endsection
