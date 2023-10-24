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
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i)
                                <tr>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="../assets/images/faces/3.jpg" alt="img">
                                            </span>{{ $i ->name }}
                                        </div>
                                    </td>
                                    <td>{{ $i->category_name }}</td>
                                    <td><span class="badge bg-primary-transparent">{{ $i->type_user }}</span></td>
                                    <td>{{ $i ->email }}</td>
                                    <td>
                                        <div class="avatar-list-stacked">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('admin/assets/images/faces/2.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('admin/assets/images/faces/8.jpg')}}" alt="img">
                                            </span>
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('admin/assets/images/faces/2.jpg')}}" alt="img">
                                            </span>
                                            <a class="avatar avatar-sm bg-primary text-fixed-white avatar-rounded"
                                                href="javascript:void(0);">
                                                +4
                                            </a>
                                        </div>
                                    </td>

                                    <td>$10,984.29</td>
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
