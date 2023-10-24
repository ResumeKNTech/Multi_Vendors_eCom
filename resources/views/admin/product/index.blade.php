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
                                        <img src="{{ asset('admin/assets/images/faces/3.jpg') }}" alt="img">
                                    </span>
                                    {{ $i->product_name }}
                                </td>
                                <td>
                                Thương Hiệu : {{ $i->brand_name }}
                                <br>
                                Mặt Hàng :  {{ $i->category_name }}
                                </td>
                                <td>{{ $i->price }}</td>
                                <td>{{ $i->stock_status }}</td>
                                <td>{{ $i->status }}</td>
                                <td>{{ $i->publish }}</td>
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
@endsection
