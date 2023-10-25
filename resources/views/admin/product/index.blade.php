@extends('layouts.app')
@section('module', 'Sản Phẩm')
@section('action', 'Danh Sách')
@section('content')
    <div class="col-xl-12">
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
                            <th>Sản Phẩm</th>
                            <th>Loại</th>
                            <th>Giá (VND)</th>
                            <th>Tình Trạng</th>
                            <th>Trạng Thái</th>
                            <th>Ngày Xuất Bản</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $i)
                            <tr>
                                <td>
                                    <span class="avatar avatar-xs me-2 online avatar-rounded">
                                        <img src="{{ asset($i->images) }}" alt="{{ $i->product_name }}">
                                    </span>
                                    {{ $i->product_name }}
                                </td>
                                <td>
                                    Thương Hiệu : {{ $i->brand_name }}
                                    <br>
                                    Mặt Hàng : {{ $i->category_name }}
                                </td>
                                <td>{{ $i->price }}</td>
                                <td>{{ $i->stock_status }}</td>
                                <td>{{ $i->status }}</td>
                                <td>{{ $i->publish }}</td>
                                <td>

                                        <div class="hstack gap-2 fs-15">
                                            <a href="{{ route('admin.product.edit', $i->id) }}" class="btn btn-icon btn-sm btn-info"><i class="ri-edit-line"></i></a>
                                            <a href="#" class="btn btn-icon btn-sm btn-danger" onclick="confirmDelete('{{ route('admin.product.destroy', $i->id) }}')"><i class="ri-delete-bin-6-line"></i></a>
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
    <script>
        function confirmDelete(deleteUrl) {
            var confirmDeleteButton = document.getElementById("confirmDeleteButton");
            confirmDeleteButton.href = deleteUrl;

            var myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            myModal.show();
        }
    </script>

@endsection
