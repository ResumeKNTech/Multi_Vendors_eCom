@extends('layouts.app')
@section('module','Liên Hệ')
@section('action','Danh Sách')
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
                            <th>STT</th>
                            <th>Tên Người Gửi</th>
                            <th>Chủ Đề</th>
                            <th>Email</th>
                            <th>Điện Thoại</th>
                            <th>Tình Trạng</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($message as $i)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $i->name }}
                                </td>

                                <td>{{ $i->subject }}</td>
                                <td>{{ $i->email }}</td>
                                <td>{{ $i->phone }}</td>
                                <td>{{ $i->read_at ? 'Đã Đọc' : 'Chưa Xem' }}</td>

                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="{{ route('admin.message.show', $i->id) }}"
                                            class="btn btn-icon btn-sm btn-info"><i class="bi-eye-fill  "></i></a>
                                        <a href="#" class="btn btn-icon btn-sm btn-danger"
                                            onclick="confirmDelete('{{ route('admin.message.destroy', $i->id) }}')"><i
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
