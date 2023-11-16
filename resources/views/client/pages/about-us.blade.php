@extends('client.layouts.app')

@section('title','E-SHOP || Blog Page')

@section('main-content')
<!-- About Us -->
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
                        <a href="{{route('blog')}}" class="btn">Our Blog</a>
                        <a href="{{route('contact-us')}}" class="btn primary">Contact Us</a>
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