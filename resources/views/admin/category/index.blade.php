@extends('layouts.app')
@section('module', 'Danh Mục Cha')
@section('action', 'Danh Sách')
@section('content')
    <div class="col-xl-4">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Tạo Danh Mục Cha
                </div>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Tên Danh Mục:</label>
                        <input type="text" name="category_name" id="category_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug:</label>
                        <input type="text" name="slug" id="slug" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả:</label>
                        <input type="text" name="description" id="description" class="form-control">
                        <div id="emailHelp" class="form-text">Làm ơn điền đầy đủ thông tin.</div>
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
                            <th>STT</th>
                            <th>Loại</th>
                            <th>Slug</th>
                            <th>Mô Tả</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $i)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $i->category_name }}
                                </td>

                                <td>{{ $i->slug }}</td>
                                <td>{{ $i->description }}</td>

                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <button class="btn btn-icon btn-sm btn-info editBtn" data-id="{{ $i->id }}"
                                            data-name="{{ $i->category_name }}" data-slug="{{ $i->slug }}"
                                            data-description="{{ $i->description }}"><i class="ri-edit-line"></i></button>
                                        <a href="#" class="btn btn-icon btn-sm btn-danger"
                                            onclick="confirmDelete('{{ route('admin.category.destroy', $i->id) }}')"><i
                                                class="ri-delete-bin-6-line"></i></a>


                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa danh mục</h5>

                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf


                        <div class="mb-3">
                            <label for="edit_category_name" class="form-label">Tên Danh Mục:</label>
                            <input type="text" name="category_name" id="edit_category_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="edit_slug" class="form-label">Slug:</label>
                            <input type="text" name="slug" id="edit_slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Mô Tả:</label>
                            <input type="text" name="description" id="edit_description" class="form-control">
                            <div id="edit_emailHelp" class="form-text">Làm ơn điền đầy đủ thông tin.</div>
                        </div>

                        <button type="submit" style="width:100%" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
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
            $('.editBtn').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var slug = $(this).data('slug');
                var description = $(this).data('description');

                var updateUrl = "{{ route('admin.category.update', ['id' => ':id']) }}";
                updateUrl = updateUrl.replace(':id', id);

                $('#editForm').attr('action',
                    updateUrl); // Điều chỉnh URL của form dựa vào ID// Điều chỉnh URL của form dựa vào ID
                $('#editForm input[name="category_name"]').val(name);
                $('#editForm input[name="slug"]').val(slug);
                $('#editForm input[name="description"]').val(description);

                $('#editModal').modal('show'); // Hiển thị modal
            });
        });
        // Sự kiện khi nhập Category Name trong modal
        $('#edit_category_name').on('input', function() {
            // Lấy giá trị của Category Name
            var categoryName = $(this).val();

            // Chuyển đổi thành Slug
            var slug = convertToSlug(categoryName);

            // Gán Slug vào trường input Slug trong modal
            $('#edit_slug').val(slug);
        });
    </script>
    <script>
        // Hàm chuyển đổi chuỗi thành Slug
        function convertToSlug(text) {
            // Define a dictionary of accented characters and their replacements
            text = text.toLowerCase();

            const accentChars = {
                'á': 'a',
                'à': 'a',
                'ả': 'a',
                'ã': 'a',
                'ạ': 'a',
                'ă': 'a',
                'ắ': 'a',
                'ằ': 'a',
                'ẳ': 'a',
                'ẵ': 'a',
                'ặ': 'a',
                'â': 'a',
                'ấ': 'a',
                'ầ': 'a',
                'ẩ': 'a',
                'ẫ': 'a',
                'ậ': 'a',
                'é': 'e',
                'è': 'e',
                'ẻ': 'e',
                'ẽ': 'e',
                'ẹ': 'e',
                'ê': 'e',
                'ế': 'e',
                'ề': 'e',
                'ể': 'e',
                'ễ': 'e',
                'ệ': 'e',
                'í': 'i',
                'ì': 'i',
                'ỉ': 'i',
                'ĩ': 'i',
                'ị': 'i',
                'ó': 'o',
                'ò': 'o',
                'ỏ': 'o',
                'õ': 'o',
                'ọ': 'o',
                'ô': 'o',
                'ố': 'o',
                'ồ': 'o',
                'ổ': 'o',
                'ỗ': 'o',
                'ộ': 'o',
                'ơ': 'o',
                'ớ': 'o',
                'ờ': 'o',
                'ở': 'o',
                'ỡ': 'o',
                'ợ': 'o',
                'ú': 'u',
                'ù': 'u',
                'ủ': 'u',
                'ũ': 'u',
                'ụ': 'u',
                'ư': 'u',
                'ứ': 'u',
                'ừ': 'u',
                'ử': 'u',
                'ữ': 'u',
                'ự': 'u',
                'ý': 'y',
                'ỳ': 'y',
                'ỷ': 'y',
                'ỹ': 'y',
                'ỵ': 'y',
                'đ': 'd',

            };

            // Replace accented characters with their non-accented counterparts
            text = text.replace(/[áàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵđ]/g, char =>
                accentChars[char] || char);

            // Remove any remaining special characters or spaces
            text = text.replace(/[^\w\s-]/g, '');

            // Replace spaces with hyphens
            text = text.replace(/\s+/g, '-');
            return text;
        }
        // Sự kiện khi nhập Product Title
        $('#category_name').on('input', function() {
            // Lấy giá trị của Product Title
            var productTitle = $(this).val();

            // Chuyển đổi thành Slug
            var slug = convertToSlug(productTitle);

            // Gán Slug vào trường input Slug
            $('#slug').val(slug);
        });
    </script>
@endsection
