@extends('layouts.app')
@section('module', 'Sản Phẩm')
@section('action', 'Danh Sách')
@section('content')
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    @yield('action')
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tiêu Đề</th>
                                <th scope="col">Sản Phẩm</th>
                                <th scope="col">Loại</th>
                                <th scope="col">Mặt Hàng</th>
                                <th scope="col">Giá(VND)</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Hàng Tồn</th>
                                <th scope="col">Tình Trạng</th>
                                <th scope="col">Ngày Đăng</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $i->product_title }}
                                    </td>
                                    <td>
                                        <div class="avatar-list-stacked">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('' . $i->lg) }}" alt="Logo">
                                            </span>
                                            {{ $i->product_name }}
                                        </div>
                                    </td>
                                    <td>{{ $i->category_name }}</td>
                                    <td>
                                        {{ $i->sub_category_name }}
                                    </td>

                                    <td>{{ $i->price }}</td>
                                    <td>{{ $i->stock }}</td>
                                    <td>
                                        @if($i->stock_status === 'in_stock')
                                           Còn Hàng
                                        @elseif($i->stock_status === 'out_of_stock')
                                            Hết Hàng
                                        @endif
                                    </td>
                                    <td>
                                        @if($i->status === 'published')
                                            Xuất Bản
                                        @elseif($i->status === 'draft')
                                            Nháp
                                        @endif
                                    </td>

                                    <td>{{ $i->publish }}</td>
                                    <td>

                                        <div class="hstack gap-2 fs-15">
                                            <a href="{{ route('admin.product.edit', $i->id) }}"
                                                class="btn btn-icon btn-sm btn-info"><i class="ri-edit-line"></i></a>
                                            <a href="#" class="btn btn-icon btn-sm btn-danger"
                                                onclick="confirmDelete('{{ route('admin.product.destroy', $i->id) }}')"><i
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

        <script>
            function confirmDelete(deleteUrl) {
                var confirmDeleteButton = document.getElementById("confirmDeleteButton");
                confirmDeleteButton.href = deleteUrl;

                var myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                myModal.show();
            }
        </script>
    </div>
@endsection
