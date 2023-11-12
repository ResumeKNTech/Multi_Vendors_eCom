@extends('layouts.app')
@section('module', 'Vận Chuyển')
@section('action', 'Danh Sách')
@section('content')
    <div class="col-xl-4">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Vận Chuyển
                </div>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.shipping.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Khu Vực:</label>
                        <input type="text" name="area" id="category_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Giá:</label>
                        <input type="text" name="price" id="slug" class="form-control">
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <select class="form-control" name="status">
                                <option value="active">
                                    Active
                                </option>
                                <option value="inactive">In Active</option>

                            </select>
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
                            <th>STT</th>
                            <th>Khu vực</th>
                            <th>Giá</th>
                            <th>Trạng Thái</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shippings as $i)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $i->area }}
                                </td>

                                <td>{{ $i->price }}</td>

                                <td  style="text-align: center; align-items:center" class="badge bg-secondary-transparent" >{{ $i->status == 'active' ? 'Active' : 'In Active' }}</td>

                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <button class="btn btn-icon btn-sm btn-info editBtn" data-id="{{ $i->id }}"
                                            data-name="{{ $i->area }}" data-description="{{ $i->area }}"><i
                                                class="ri-edit-line"></i></button>
                                        <a href="#" class="btn btn-icon btn-sm btn-danger"
                                            onclick="confirmDelete('{{ route('admin.shipping.destroy', $i->id) }}')"><i
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
                                Bạn có chắc chắn muốn xóa mục này không?
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

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Chỉnh sửa</h5>

                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST">
                            @csrf


                            <div class="mb-3">
                                <label for="edit_category_name" class="form-label">Khu vực:</label>
                                <input type="text" value="{{ old('area') }}" name="area" id=" " class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Giá:</label>
                                <input type="text" name="price"  value="{{ old('price') }}" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <select class="form-control" name="status">
                                    <option value="active">
                                        Active
                                    </option>
                                    <option value="inactive">In Active</option>

                                </select>
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
                var name = $(this).data('area');
                var slug = $(this).data('price');
                var description = $(this).data('status');

                var updateUrl = "{{ route('admin.shipping.update', ['id' => ':id']) }}";
                updateUrl = updateUrl.replace(':id', id);

                $('#editForm').attr('action',
                    updateUrl); // Điều chỉnh URL của form dựa vào ID// Điều chỉnh URL của form dựa vào ID
                $('#editForm input[name="area"]').val(name);
                $('#editForm input[name="price"]').val(slug);
                $('#editForm input[name="status"]').val(description);

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

@endsection
