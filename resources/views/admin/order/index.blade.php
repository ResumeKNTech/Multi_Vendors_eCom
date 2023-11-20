@extends('layouts.app')
@section('content')

<div class="col-xl-12">
  <div class="card custom-card">
      <div class="card-header">
          <div class="card-title">
              Danh Sách
          </div>
      </div>
      <div class="card-body">
        @if(count($orders)>0)
          <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap w-100">
              <thead>
                <tr>
                  <th>S.N.</th>
                  <th>Order No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Quantity</th>
                  <th>Charge</th>
                  <th>Total Amount</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                @php
                    $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
                @endphp
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->order_number}}</td>
                        <td>{{$order->first_name}} {{$order->last_name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>@foreach($shipping_charge as $data)  {{$data}} VND @endforeach</td>
                        <td>{{number_format($order->total_amount)}} VND </td>
                        <td>
                            @if($order->status=='new')
                            <span class="badge bg-primary-transparent">{{$order->status}}</span>
                            @elseif($order->status=='process')
                            <span class="badge bg-warning-transparent">{{$order->status}}</span>
                            @elseif($order->status=='delivered')
                            <span class="badge bg-success-transparent">{{$order->status}}</span>
                            @else
                            <span class="badge bg-danger-transparent">{{$order->status}}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.order.show',$order->id)}}" class="btn btn-warning btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>
                            <a href="{{route('admin.order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                            <a href="{{route('admin.order.destroy',$order->id)}}" class="btn btn-danger btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="delete" data-placement="bottom"><i class="fas fa-trash"></i></a>
    
    
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            <span style="float:right">{{$orders->links()}}</span>
            @else
              <h6 class="text-center">No orders found!!! Please order some products</h6>
            @endif
          </table>
        
      </div>
  </div>
</div>


@endsection
