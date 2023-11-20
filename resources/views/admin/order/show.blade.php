@extends('layouts.app')
@section('module', 'Đơn Hàng')
@section('action', 'Chi Tiết')

@section('content')
<div class="card">
<h5 class="card-header">Đơn Hàng<a href="{{route('order.pdf', $order->id)}}" class="btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Tạo PDF</a>
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
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
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{ number_format((float)$order->shipping->price, ((int)$order->shipping->price == (float)$order->shipping->price) ? 0 : 2, '.', ',') }} VND</td>
            <td>{{ number_format((float)$order->total_amount, ((int)$order->total_amount == (float)$order->total_amount) ? 0 : 2, '.', ',') }} VND</td>

            <td>
                @if($order->status == 'new')
                  <span class="badge badge-primary">Mới</span>
                @elseif($order->status == 'process')
                  <span class="badge badge-warning">Đang Xử Lý</span>
                @elseif($order->status == 'delivered')
                  <span class="badge badge-success">Đã Giao</span>
                @else
                  <span class="badge badge-danger">{{$order->status}}</span>
                @endif
            </td>
            <td>
                <a href="{{route('admin.order.edit', $order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="Chỉnh sửa" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <a href="{{route('admin.order.destroy', $order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="Xóa" data-placement="bottom"><i class="fas fa-trash"></i></a>

            </td>

        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">THÔNG TIN ĐƠN HÀNG</h4>
              <table class="table">
                    <tr class="">
                        <td>Mã Đơn Hàng</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>Ngày Đặt Hàng</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} lúc {{$order->created_at->format('g : i a')}}</td>
                    </tr>
                    <tr>
                        <td>Số Lượng</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>Trạng Thái Đơn Hàng</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                        <td>Phí Vận Chuyển</td>
                        <td> : {{ number_format((float)$order->shipping->price, ((int)$order->shipping->price == (float)$order->shipping->price) ? 0 : 2, '.', ',') }} VND</td>
                    </tr>
                    <tr>
                      <td>Khuyến Mãi</td>
                      <td> :  {{ number_format((float)$order->coupon, ((int)$order->coupon == (float)$order->coupon) ? 0 : 2, '.', ',') }} VND</td>
                    </tr>
                    <tr>
                        <td>Tổng Số Tiền</td>
                        <td> : {{ number_format((float)$order->total_amount, ((int)$order->total_amount == (float)$order->total_amount) ? 0 : 2, '.', ',') }} VND</td>
                    </tr>

                    <tr>
                        <td>Phương Thức Thanh Toán</td>
                        <td> : @if($order->payment_method == 'cod') Thanh Toán Khi Nhận Hàng @else Paypal @endif</td>
                    </tr>
                    <tr>
                        <td>Trạng Thái Thanh Toán</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">THÔNG TIN GIAO HÀNG</h4>
              <table class="table">
                    <tr class="">
                        <td>Họ Tên</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>Số Điện Thoại</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Địa Chỉ</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>Quốc Gia</td>
                        <td> : {{$order->country}}</td>
                    </tr>

              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info, .shipping-info {
        background: #ECECEC;
        padding: 20px;
    }
    .order-info h4, .shipping-info h4 {
        text-decoration: underline;
    }

</style>
@endpush
