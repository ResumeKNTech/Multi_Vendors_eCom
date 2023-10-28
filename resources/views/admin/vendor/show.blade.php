@extends('layouts.app')
@section('module', 'Gian Hàng')
@section('action', 'Thông Tin')
@section('content')

    <div class="col-xxl-4 col-xl-12">
        <div class="card custom-card overflow-hidden">
            <div class="card-body p-0">
                <div class="d-sm-flex align-items-top p-4 border-bottom-0 main-profile-cover">
                    <div>
                        <span class="avatar avatar-xxl avatar-rounded online me-3">
                            <img src="{{ asset($user->user_image) }}" alt="">
                        </span>
                    </div>
                    <div class="flex-fill main-profile-info">
                        <div class="d-flex align-items-center justify-content-between">

                            <h6 class="fw-semibold mb-1 text-fixed-white">{{ $user->name }}</h6>


                            <button class="btn btn-light btn-wave"><i
                                    class="ri-add-line me-1 align-middle d-inline-block"></i>Shop</button>
                        </div>
                        <p class="mb-1 text-muted text-fixed-white op-7">{{ strtoupper($user->type_user) }}</p>

                        <p class="fs-12 text-fixed-white mb-4 op-5">
                            <span class="me-3"><i
                                    class="ri-building-line me-1 align-middle"></i>{{ $user->city }}</span>
                            <span><i class="ri-map-pin-line me-1 align-middle"></i>{{ $user->address }}</span>
                        </p>
                        <div class="d-flex mb-0">
                            <div class="me-4">
                                <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0">{{ $categoryCount }}</p>
                                <p class="mb-0 fs-11 op-5 text-fixed-white">Danh Mục</p>
                            </div>
                            <div class="me-4">
                                <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0">{{ $brandCount }}</p>
                                <p class="mb-0 fs-11 op-5 text-fixed-white">Thương Hiệu</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="p-4 border-bottom border-block-end-dashed">
                    <div class="mb-4">
                        <p class="fs-15 mb-2 fw-semibold">Thông tin :</p>
                        <p class="fs-12 text-muted op-7 mb-0">
                            Gian Hàng <b class="text-default">{{ $user->name }}</b> {{ $user->short_bio }}
                        </p>
                    </div>
                    <div class="mb-0">
                        <p class="fs-15 mb-2 fw-semibold">Links :</p>
                        <div class="mb-0">
                            <p class="mb-1">
                                <a href="https://www.spruko.com/" class="text-primary"><u>{{ $user->link_fb }}</u></a>
                            </p>
                            <p class="mb-0">
                                <a href="https://themeforest.net/user/spruko/portfolio"
                                    class="text-primary"><u>{{ $user->link_zalo }}</u></a>
                            </p>
                            <p class="mb-0">
                                <a href="https://themeforest.net/user/spruko/portfolio"
                                    class="text-primary"><u>{{ $user->link_github }}</u></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="p-4 border-bottom border-block-end-dashed">
                    <p class="fs-15 mb-2 me-4 fw-semibold">Thông tin gian hàng :</p>
                    <div class="text-muted">
                        <p class="mb-2">
                            <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                <i class="ri-mail-line align-middle fs-14"></i>
                            </span>
                            {{ $user->address }}
                        </p>
                        <p class="mb-2">
                            <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                <i class="ri-phone-line align-middle fs-14"></i>
                            </span>
                            {{ $user->phone }}

                        </p>
                        <p class="mb-0">
                            <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                <i class="ri-map-pin-line align-middle fs-14"></i>
                            </span>
                            {{ $user->city }}

                        </p>
                    </div>
                </div>
                <div class="p-4 border-bottom border-block-end-dashed d-flex align-items-center">
                    <p class="fs-15 mb-2 me-4 fw-semibold">Mạng Xã Hội :</p>
                    <div class="btn-list mb-0">
                        <a href="<?php echo $user->link_fb; ?>">
                            <button class="btn btn-sm btn-icon btn-primary-light btn-wave waves-effect waves-light">
                                <i class="ri-facebook-line fw-semibold"></i>
                            </button>
                        </a>
                        <a href="<?php echo $user->link_fb; ?>">
                            <button class="btn btn-sm btn-icon btn-secondary-light btn-wave waves-effect waves-light">
                                <i class="ri-twitter-line fw-semibold"></i>
                            </button>
                        </a>
                        <a href="<?php echo $user->link_fb; ?>">
                            <button class="btn btn-sm btn-icon btn-warning-light btn-wave waves-effect waves-light">
                                <i class="ri-instagram-line fw-semibold"></i>
                            </button>
                        </a>
                        <a href="<?php echo $user->link_fb; ?>">
                            <button class="btn btn-sm btn-icon btn-success-light btn-wave waves-effect waves-light">
                                <i class="ri-github-line fw-semibold"></i>
                            </button>
                        </a>
                        <a href="<?php echo $user->link_fb; ?>">
                            <button class="btn btn-sm btn-icon btn-danger-light btn-wave waves-effect waves-light">
                                <i class="ri-youtube-line fw-semibold"></i>
                            </button>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="col-xxl-8 col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body p-0">
                        <div
                            class="p-3 border-bottom border-block-end-dashed d-flex align-items-center justify-content-between">
                            <div>
                                <ul class="nav nav-tabs mb-0 tab-style-6 justify-content-start" id="myTab"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="activity-tab" data-bs-toggle="tab"
                                            data-bs-target="#activity-tab-pane" type="button" role="tab"
                                            aria-controls="activity-tab-pane" aria-selected="true"><i
                                                class="ri-gift-line me-1 align-middle d-inline-block"></i>Tất Cả Danh
                                            Mục</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="posts-tab" data-bs-toggle="tab"
                                            data-bs-target="#posts-tab-pane" type="button" role="tab"
                                            aria-controls="posts-tab-pane" aria-selected="false"><i
                                                class="ri-bill-line me-1 align-middle d-inline-block"></i>Tất Cả Sản
                                            Phẩm</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="followers-tab" data-bs-toggle="tab"
                                            data-bs-target="#followers-tab-pane" type="button" role="tab"
                                            aria-controls="followers-tab-pane" aria-selected="false"><i
                                                class="ri-money-dollar-box-line me-1 align-middle d-inline-block"></i>Doanh
                                            Thu</button>
                                    </li>

                                </ul>
                            </div>

                        </div>
                        <div class="p-3">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane show active fade p-0 border-0" id="activity-tab-pane"
                                    role="tabpanel" aria-labelledby="activity-tab" tabindex="0">
                                    <ul class="list-unstyled profile-timeline">
                                        @php
                                            $displayedCategories = [];
                                        @endphp
                                        @foreach ($userData as $data)
                                            @if (!in_array($data->category_name, $displayedCategories))
                                                <li>
                                                    <div>
                                                        <span
                                                            class="avatar avatar-sm avatar-rounded profile-timeline-avatar">
                                                            <img src="{{ asset($user->user_image) }}" alt="">
                                                        </span>
                                                        <p class="mb-1">
                                                            <b>{{ $user->name }}</b> có danh mục
                                                            <b>{{ $data->category_name }}</b>.<span
                                                                class="float-end fs-11 text-muted">{{ $data->category_created_at }}</span>
                                                        </p>
                                                        @php
                                                            // Gather all the brand names for this category
                                                            $brandsForCategory = $userData->filter(function ($item) use ($data) {
                                                                return $item->category_name == $data->category_name;
                                                            });
                                                            $brandNames = $brandsForCategory->pluck('brand_name')->toArray();
                                                        @endphp
                                                        <p class="text-muted">gồm các thương hiệu
                                                            {{ implode(', ', $brandNames) }}</p>
                                                    </div>
                                                </li>
                                                @php
                                                    $displayedCategories[] = $data->category_name;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane fade p-0 border-0" id="posts-tab-pane" role="tabpanel"
                                    aria-labelledby="posts-tab" tabindex="0">
                                    <ul class="list-group">

                                        <li class="list-group-item" id="profile-posts-scroll">
                                            <div class="row gy-3">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                    @foreach ($products as $product)
                                                        <div class="rounded border">
                                                            <div class="p-3 d-flex align-items-top flex-wrap">

                                                                <div class="me-2">
                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                        <img src="{{ asset($user->user_image) }}"
                                                                            alt="">
                                                                    </span>
                                                                </div>
                                                                <div class="flex-fill">
                                                                    <p class="mb-1 fw-semibold lh-1">
                                                                        Gian Hàng :
                                                                        {{ $user->name }}

                                                                    </p>
                                                                    <p class="fs-11 mb-2 text-muted">
                                                                        {{ $product->created_at }}</p>
                                                                    <p class="fs-12 text-muted mb-1">Đã đăng tải sản
                                                                        phẩm {{ $product->product_name }}</span>.</p>
                                                                    <div class="d-flex lh-1 justify-content-between mb-3">
                                                                        <div>
                                                                            <a href="javascript:void(0);">
                                                                                <span class="avatar avatar-md me-1">
                                                                                    <img src="{{ asset($product->images) }}"
                                                                                        alt="">
                                                                                </span>
                                                                            </a>
                                                                            @foreach ($product->images_gallery as $image)
                                                                                <a href="javascript:void(0);">
                                                                                    <span class="avatar avatar-md me-1">
                                                                                        <img src="{{ asset($image) }}"
                                                                                            alt="">
                                                                                    </span>
                                                                                </a>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div
                                                                    class="d-flex align-items-center justify-content-between mb-md-0 mb-2">
                                                                    <div>
                                                                        <div class="btn-list">
                                                                            <button
                                                                                class="btn btn-primary-light btn-sm btn-wave">
                                                                                Comment
                                                                            </button>
                                                                            <button
                                                                                class="btn btn-icon btn-sm btn-success-light btn-wave">
                                                                                <i class="ri-thumb-up-line"></i>
                                                                            </button>
                                                                            <button
                                                                                class="btn btn-icon btn-sm btn-danger-light btn-wave">
                                                                                <i class="ri-share-line"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-top">
                                                                        <div>
                                                                            <span
                                                                                class="badge bg-success-transparent me-2">{{ $product->brand_name }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="avatar-list-stacked d-block mt-4 ">
                                                                        <span class="avatar avatar-xs avatar-rounded">
                                                                            <img src="{{ asset($product->logo_images) }}"
                                                                                alt="img">
                                                                        </span>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="tab-pane fade p-0 border-0" id="followers-tab-pane" role="tabpanel"
                                    aria-labelledby="followers-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">

                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade p-0 border-0" id="gallery-tab-pane" role="tabpanel"
                                    aria-labelledby="gallery-tab" tabindex="0">
                                    <div class="row">

                                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">

                                        </div>
                                        <div class="col-xl-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xl-4">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Thông Tin Cá Nhân
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="me-2 fw-semibold">
                                        Tên Chủ:
                                    </div>
                                    <span class="fs-12 text-muted">{{ $user->first_name }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="me-2 fw-semibold">
                                        Email :
                                    </div>
                                    <span class="fs-12 text-muted">{{ $user->email }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="me-2 fw-semibold">
                                        Điện Thoại :
                                    </div>
                                    <span class="fs-12 text-muted">{{ $user->phone }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="me-2 fw-semibold">
                                        Chức Vụ :
                                    </div>
                                    <span class="fs-12 text-muted">{{ strtoupper($user->type_user) }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="me-2 fw-semibold">
                                        City :
                                    </div>
                                    <span class="fs-12 text-muted">{{ $user->city }}</span>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card custom-card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">
                            Sản Phẩm Đăng Gần Đây
                        </div>
                        <div>
                            <span class="badge bg-primary-transparent">Today</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($recentProducts as $product)
                            <li class="list-group-item">
                                <a href="javascript:void(0);">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="avatar avatar-md me-3">
                                            <img src="{{ asset($product->images) }}"
                                                class="img-fluid" alt="...">
                                        </span>
                                        <div class="flex-fill">
                                            <p class="fw-semibold mb-0">{{ $product->product_name }}</p>
                                            <p class="mb-1 fs-12 profile-recent-posts text-truncate text-muted">
                                                {{ $product->short_description }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card custom-card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">
                            Số Liệu
                        </div>
                        <div>
                            <button class="btn btn-sm btn-success-light btn-wave">View All</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">

                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-icon btn-primary-light">
                                            <i class="ri-add-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">

                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-icon btn-primary-light">
                                            <i class="ri-add-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">

                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-icon btn-primary-light">
                                            <i class="ri-add-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">

                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-icon btn-primary-light">
                                            <i class="ri-add-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-semibold d-flex align-items-center">

                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-icon btn-primary-light">
                                            <i class="ri-add-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
