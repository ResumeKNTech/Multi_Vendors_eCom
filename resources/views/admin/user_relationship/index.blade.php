@extends('layouts.app')
@section('module', ' Đăng Ký')
@section('action', 'Gian Hàng')
@section('content')
    <div class="col-xl-4">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Đăng Ký Gian Hàng
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user_relationship.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Gian Hàng:</label>
                        <select class="form-control" name="user_id" id="user_id">
                            @if (auth()->check() && auth()->user()->type_user == 'vendor')
                                <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Danh Mục:</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">-- Vui lòng chọn --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Thương Hiệu:</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                            <option value="">-- Vui lòng chọn --</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
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
                            <th>Gian Hàng</th>
                            <th>Danh Mục</th>
                            <th>Thương Hiệu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userRelationships as $relationship)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $relationship->user_name }}</td>
                                <td>{{ $relationship->category_name }}</td>
                                <td>{{ $relationship->brand_name }}</td>
                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <button class="btn btn-icon btn-s, btn-info editBtn"
                                            data-id="{{ $relationship->id }}" data-user-id="{{ $relationship->user_id }}"
                                            data-category-id="{{ $relationship->category_id }}"
                                            data-brand-id="{{ $relationship->brand_id }}"><i
                                                class="ri-edit-line"></i></button>
                                        <button class="btn btn-icon btn-sm btn-danger"
                                            onclick="confirmDelete('{{ route('admin.user_relationship.destroy', $relationship->id) }}')"><i
                                                class="ri-delete-bin-6-line"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa mục này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <a id="confirmDeleteButton" href="#" class="btn btn-danger">Xóa</a>
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
                    <h5 class="modal-title" id="editModalLabel">Chỉnh sửa mục</h5>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="edit_user_id" class="form-label">Người dùng:</label>
                            <select class="form-control" name="user_id" id="edit_user_id">
                                <option value="">-- Vui lòng chọn --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_category_id" class="form-label">Danh Mục:</label>
                            <select class="form-control" name="category_id" id="edit_category_id">
                                <option value="">-- Vui lòng chọn --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_brand_id" class="form-label">Thương Hiệu:</label>
                            <select class="form-control" name="brand_id" id="edit_brand_id">
                                <option value="">-- Vui lòng chọn --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.editBtn').click(function() {
                var id = $(this).data('id');
                var userId = $(this).data('user-id');
                var categoryId = $(this).data('category-id');
                var brandId = $(this).data('brand-id');

                var updateUrl = "{{ route('admin.user_relationship.update', ['id' => ':id']) }}";
                updateUrl = updateUrl.replace(':id', id);

                $('#editForm').attr('action', updateUrl);
                $('#edit_user_id').val(userId);
                $('#edit_category_id').val(categoryId);
                $('#edit_brand_id').val(brandId);

                $('#editModal').modal('show');
            });
        });
    </script>
    <script>
        function confirmDelete(deleteUrl) {
            var confirmDeleteButton = document.getElementById("confirmDeleteButton");
            confirmDeleteButton.href = deleteUrl;

            var myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            myModal.show();
        }
    </script>
@endsection
