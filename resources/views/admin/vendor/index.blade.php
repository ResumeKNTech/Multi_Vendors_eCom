{{-- @extends('layouts.app')
@section('module', 'Gian Hàng')
@section('action', 'Danh Sách')
@section('content')
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Danh Sách Gian Hàng
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Tên Gian Hàng</th>
                                <th scope="col">Loại Mặt Hàng</th>
                                <th scope="col">Vai Trò</th>
                                <th scope="col">Gmail</th>
                                <th scope="col">Thương Hiệu</th>
                                <th scope="col">Doanh Thu</th>
                                <th scope="col">Category ID</th>
                                <th scope="col">Created At (User Relationship)</th>
                                <th scope="col">Created At (Category)</th>
                                <th scope="col">Created At (Brand)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="../assets/images/faces/3.jpg" alt="img">
                                            </span>{{ $item->user_name }}
                                        </div>
                                    </td>
                                    <td>{{ $item->type_user }}</td>
                                    <td><span class="badge bg-primary-transparent">{{ $item->email }}</span></td>
                                    <td>
                                        <div class="avatar-list-stacked">
                                            @foreach ($userBrands[$item->user_id] as $brand)
                                                <span class="avatar avatar-sm avatar-rounded">
                                                    <img src="{{ asset('' . $brand['lg']) }}" alt="Logo">
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>$10,984.29</td>
                                    <td>
                                        @foreach ($userCategories[$item->user_id] as $category)
                                            {{ $category['category_name'] }}
                                            @if (!$loop->last) <!-- Thêm dấu phẩy nếu không phải là phần tử cuối cùng -->
                                                ,
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $item->category_created_at }}</td>
                                    <td>{{ $item->brand_created_at }}</td>
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
    </div>
@endsection --}}

@extends('layouts.app')
@section('module', 'Gian Hàng')
@section('action', 'Danh Sách')
@section('content')
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Danh Sách Gian Hàng
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Tên Gian Hàng</th>
                                <th scope="col">Loại Mặt Hàng</th>
                                <th scope="col">Vai Trò</th>
                                <th scope="col">Gmail</th>
                                <th scope="col">Thương Hiệu</th>
                                <th scope="col">Doanh Thu</th>
                                <th scope="col">Category ID</th>
                                <th scope="col">Created At (User Relationship)</th>
                                <th scope="col">Created At (Category)</th>
                                <th scope="col">Created At (Brand)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                @if (!in_array($item->user_id, $processedUserIds))
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                    <img src="{{ asset('' . $item->user_image )}}" alt="img">
                                                </span>
                                                {{ $item->user_name }}
                                            </div>
                                        </td>
                                        <td>{{ $item->type_user }}</td>
                                        <td><span class="badge bg-primary-transparent">{{ $item->email }}</span></td>
                                        <td>
                                            <div class="avatar-list-stacked">
                                                @foreach ($userBrands[$item->user_id] as $brand)
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{ asset('' . $brand['lg']) }}" alt="Logo">
                                                    </span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>$10,984.29</td>
                                        <td>
                                            @foreach ($userCategories[$item->user_id] as $category)
                                                {{ $category['category_name'] }}
                                                @if (!$loop->last) <!-- Thêm dấu phẩy nếu không phải là phần tử cuối cùng -->
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $item->category_created_at }}</td>
                                        <td>{{ $item->brand_created_at }}</td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                        class="ri-download-2-line"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info"><i
                                                        class="ri-edit-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $processedUserIds[] = $item->user_id; // Đánh dấu user_id đã được xử lý ?>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
