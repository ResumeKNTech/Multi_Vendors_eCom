@extends('layouts.app')
@section('module', 'Đánh Giá')
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
                    <thead style="text-align: center">
                        <tr >
                            <th style="text-align: center">STT</th>
                            <th style="text-align: center">Đánh Giá Bởi</th>
                            <th style="text-align: center">Sản Phẩm</th>
                            <th style="text-align: center">Đánh Giá </th>
                            <th style="text-align: center">Rating</th>
                            <th style="text-align: center">Ngày</th>
                            <th style="text-align: center">Trạng Thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                            <tr style="text-align: center">
                                <td>{{$review->id}}</td>
                                <td>{{$review->user_info['name']}}</td>
                                <td>{{$review->product->product_title}}</td>
                                <td>{{$review->review}}</td>
                                <td>
                                    <ul style="list-style:none; display:flex; justify-content:center; align-items:center;">
                                        @for($i = 1; $i <= 5; $i++)
                                            <li>
                                                <span class="iconify" data-icon="material-symbols:star" style="color: {{$review->rate >= $i ? '#F7941D' : 'grey'}};"></span>
                                            </li>
                                        @endfor
                                    </ul>
                                </td>
                                <td>{{$review->created_at->format('M d D, Y g: i a')}}</td>
                                <td>
                                    @if($review->status=='active')
                                    <span class="badge bg-primary-transparent">
                                    {{$review->status}}</span>
                                    @else
                                    <span class="badge bg-info-transparent">
                                        {{$review->status}}</span>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                      </tbody>
                    </table><script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
                    <span style="float:right">{{$reviews->links()}}</span>

            </div>
        </div>
    </div>
@endsection
