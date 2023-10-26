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
                                <th scope="col">Created At (User Relationship)</th>
                                <th scope="col">Created At (Category)</th>
                                <th scope="col">Created At (Brand)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i)
                            <tr>
                                <td>
                                    @if (!isset($userProcessed[$i->user_id]))
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="../assets/images/faces/3.jpg" alt="img">
                                            </span>{{ $i->user_name }}
                                        </div>
                                        <?php $userProcessed[$i->user_id] = true; ?>
                                    @endif
                                </td>
                                <td>{{ $i->category_name }}</td>
                                <td><span class="badge bg-primary-transparent">{{ $i->type_user }}</span></td>
                                <td>{{ $i->email }}</td>
                                <td>
                                    <div class="avatar-list-stacked">
                                        <span class="avatar avatar-sm avatar-rounded">
                                            <img src="{{ asset($i->lg) }}" alt="Logo">
                                        </span>
                                        @if (isset($userBrands[$i->user_id]))
                                            @foreach ($userBrands[$i->user_id] as $brand)
                                                <span class="avatar avatar-sm avatar-rounded">
                                                    <img src="{{ asset($brand['lg']) }}" alt="Logo">
                                                </span>
                                            @endforeach
                                            @if (count($userBrands[$i->user_id]) > 0)
                                                <a class="avatar avatar-sm bg-primary text-fixed-white avatar-rounded"
                                                    href="javascript:void(0);">
                                                    +{{ count($userBrands[$i->user_id]) }}
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                                <td>$10,984.29</td>
                                <td>{{ $i->user_relationship_created_at }}</td>
                                <td>{{ $i->category_created_at }}</td>
                                <td>{{ $i->brand_created_at }}</td>
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
@endsection
