@extends('client.layouts.app')

@section('title','GreenEcom || Giới thiệu')

@section('main-content')
<!-- About Us -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{route('index')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="javascript:void(0);">GIới thiệu</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="about-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="about-content">
                    @php
                        $settings=DB::table('settings')->get();
                    @endphp
                    <h3>Welcome To <span>Eshop</span></h3>
                    <p>@foreach($settings as $data)   {!! strip_tags( $data->description ) !!} @endforeach</p>
                    <div class="button">
                        <a href="{{route('blog')}}" class="btn">Tin Tức</a>
                        <a href="{{route('contact-us')}}" class="btn primary">Liên Lạc</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-img overlay">
                    {{-- <div class="button">
                        <a href="https://www.youtube.com/watch?v=nh2aYrGMrIE" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
                    </div> --}}
                    <img src="@foreach($settings as $data) {{$data->photo}} @endforeach" alt="@foreach($settings as $data) {{$data->photo}} @endforeach">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Us -->

@endsection
