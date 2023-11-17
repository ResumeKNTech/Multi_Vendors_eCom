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
                    <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tiêu Đề | Sản Phẩm</th>
                                <th scope="col">Danh Mục</th>

                                <th scope="col">Giá gốc | Giá KM</th>
                                <th scope="col">Số Lượng |
                                    Hàng Tồn</th>
                                <th scope="col">Tình Trạng | Ngày Đăng </th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $i)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                   <td style="text-align: center">
                                        {{ $i->product_title }}
                                        /
                                        <div class="avatar-list-stacked">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('' . $i->lg) }}" alt="Logo">
                                            </span>
                                            {{ $i->product_name }}
                                        </div>
                                    </td>
                                   <td style="text-align: center">{{ $i->category_name }}</td>


                                   <td style="text-align: center">{{ $i->price }}  VND |  <span class="badge bg-primary-transparent"> {{ $i->offer_price }}
                                      VND  </span></td>
                                   <td style="text-align: center">{{ $i->stock }} |
                                        @if ($i->stock_status === 'in_stock')
                                            <span class="badge bg-primary-transparent"> Còn Hàng</span>
                                        @elseif($i->stock_status === 'out_of_stock')
                                            <span class="badge bg-primary-transparent"> Hết Hàng</span>
                                        @endif
                                    </td>
                                   <td style="text-align: center">
                                        @if ($i->status === 'published')
                                            <span class="badge bg-info-transparent"> Xuất </span>
                                        @elseif($i->status === 'draft')
                                            <span class="badge bg-info-transparent"> Nháp </span>
                                        @endif

                                     | {{ \Carbon\Carbon::parse($i->publish)->format('Y-m-d') }}


                                    </td>


                                   <td style="text-align: center">

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
