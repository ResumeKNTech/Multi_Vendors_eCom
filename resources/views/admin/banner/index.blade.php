@extends('layouts.app')
@section('module', 'Banner')
@section('action', 'Danh Sách')
@section('content')
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Danh Sách
                </div>
                <div class="prism-toggle">
                    <a href="{{ route('admin.banner.create') }}" class="btn btn-sm btn-primary-light">
                        Thêm Banner ?
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu Đề</th>
                            <th>Nội Dung</th>
                            <th>Hình </th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $i)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $i->title }}
                                </td>

                                <td> {!! strip_tags($i->description) !!} </td>
                                <td>
                                    <img src="{{ asset($i->photo) }}" width="100px" height="100px" />
                                </td>

                                <td><span class="badge bg-primary-transparent">{{ $i->status }}</span></td>

                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="{{ route('admin.banner.edit', $i->id) }}"
                                            class="btn btn-icon btn-sm btn-info"><i class="ri-edit-line"></i></a>
                                        <a href="#" class="btn btn-icon btn-sm btn-danger"
                                            onclick="confirmDelete('{{ route('admin.banner.destroy', $i->id) }}')"><i
                                                class="ri-delete-bin-6-line"></i></a>
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
