@extends('layouts.app')
@section('module', 'Đơn Hàng')
@section('action', 'Chi Tiết')

@section('content')

    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Danh Sách
                </div>
            </div>
            <div class="card-body">
                @if (count($orders) > 0)
                    <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>STT.</th>
                                <th>Mã Đơn Hàng.</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số Lượng</th>
                                <th>Phí</th>
                                <th>Tổng Số Tiền</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @php
                                    $shipping_charge = DB::table('shippings')
                                        ->where('id', $order->shipping_id)
                                        ->pluck('price');
                                @endphp
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>
                                        @foreach ($shipping_charge as $data)
                                            {{ number_format((float)$data, ((int)$data == (float)$data) ? 0 : 2, '.', ',') }} VND
                                        @endforeach
                                    </td>
                                    <td>{{ number_format((float)$order->total_amount, ((int)$order->total_amount == (float)$order->total_amount) ? 0 : 2, '.', ',') }} VND </td>

                                    <td>
                                        @if ($order->status == 'new')
                                            <span class="badge bg-primary-transparent">{{ $order->status }}</span>
                                        @elseif($order->status == 'process')
                                            <span class="badge bg-warning-transparent">{{ $order->status }}</span>
                                        @elseif($order->status == 'delivered')
                                            <span class="badge bg-success-transparent">{{ $order->status }}</span>
                                        @else
                                            <span class="badge bg-danger-transparent">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.order.show', $order->id) }}"
                                            class="btn btn-icon btn-sm btn-success editBtn"
                                            style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                            title="view" data-placement="bottom">Show</a>
                                        <a href="{{ route('admin.order.edit', $order->id) }}"
                                            class="btn btn-icon btn-s, btn-info editBtn"
                                            style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                            title="edit" data-placement="bottom"><i class="ri-edit-line"></i></a>
                                        <a href="{{ route('admin.order.destroy', $order->id) }}"
                                            class="btn btn-icon btn-sm btn-danger"
                                            style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                            title="delete" data-placement="bottom"><i class="ri-delete-bin-6-line"></i></a>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span style="float:right">{{ $orders->links() }}</span>
                @else
                    <h6 class="text-center">No orders found!!! Please order some products</h6>
                @endif
                </table>

            </div>
        </div>
    </div>


@endsection
