@extends('layouts.app')
@section('module', 'Khách Hàng')
@section('action', 'Danh Sách')
@section('content')
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Danh Sách Khách Hàng
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>

                                <th scope="col">Họ</th>
                                <th scope="col">Tên</th>
                                <th scope="col">UserName</th>
                                <th scope="col">Vai Trò</th>
                                <th scope="col">Gmail</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $i)
                                <tr>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ asset('admin/assets/images/faces/3.jpg') }}" alt="img">
                                            </span>{{ $i->last_name }}
                                        </div>
                                    </td>
                                    <td>{{ $i->first_name }}</td>
                                    <td>{{ $i->name }}</td>
                                    <td><span class="badge bg-primary-transparent">{{ $i->type_user }}</span></td>
                                    <td>{{ $i->email }}</td>



                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                       
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
