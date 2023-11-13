<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="{{ asset('admin/assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
            <img src="{{ asset('admin/assets/images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo">
            <img src="{{ asset('admin/assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                class="desktop-dark">
            <img src="{{ asset('admin/assets/images/brand-logos/toggle-dark.png') }}" alt="logo"
                class="toggle-dark">
            <img src="{{ asset('admin/assets/images/brand-logos/desktop-white.png') }}" alt="logo"
                class="desktop-white">
            <img src="{{ asset('admin/assets/images/brand-logos/toggle-white.png') }}" alt="logo"
                class="toggle-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                {{-- ! Dashboard --}}
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Quản Trị</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-home side-menu__icon"></i>
                        <span class="side-menu__label">Thống Kê</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Thống Kê</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.dashboard') }}" class="side-menu__item">Thống Kê Doanh Số </a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.dashboard') }}" class="side-menu__item">Thống Kê Gian Hàng </a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
                {{-- ! End Dashboard --}}

                {{-- ! Products --}}
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Gian hàng</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-box side-menu__icon"></i>
                        <span class="side-menu__label">Sản Phẩm</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Sản Phẩm</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.product.create') }}" class="side-menu__item">Thêm Sản Phẩm</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.product.index') }}" class="side-menu__item">Xem Danh Sách</a>
                        </li>
                    </ul>

                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-box side-menu__icon"></i>
                        <span class="side-menu__label">Thương Hiệu</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 mega-menu">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Thương Hiệu</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.brand.index') }}" class="side-menu__item">Xem Danh Sách</a>
                        </li>
                    </ul>

                </li>
                <!-- End::slide -->

                {{-- ! End Products --}}

                {{-- ! Category --}}


                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-grid-alt side-menu__icon"></i>
                        <span class="side-menu__label">Danh mục cha</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Danh mục cha</a>
                        </li>

                        <li class="slide">
                            <a href="{{ route('admin.category.index') }}" class="side-menu__item">Xem Danh Mục</a>
                        </li>

                    </ul>
                </li>
                <!-- End::slide -->
                {{-- ! End Category --}}

                {{-- !  Sub Category --}}
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-grid-alt side-menu__icon"></i>
                        <span class="side-menu__label">Danh mục con</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Danh mục con</a>
                        </li>

                        <li class="slide">
                            <a href="{{ route('admin.sub_category.index') }}" class="side-menu__item">Xem Danh
                                Sách</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
                {{-- ! End Sub Category --}}
                {{-- ! Shipping --}}


                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-grid-alt side-menu__icon"></i>
                        <span class="side-menu__label">Vận Chuyển</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Vận Chuyển</a>
                        </li>

                        <li class="slide">
                            <a href="{{ route('admin.shipping.index') }}" class="side-menu__item">Vận Chuyển</a>
                        </li>

                    </ul>
                </li>




                <!-- End::slide -->
                {{-- ! End Shipping --}}
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Bài Viết</span></li>
                <!-- End::slide__category -->
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-grid-alt side-menu__icon"></i>
                        <span class="side-menu__label">Bài Viết</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Bài Viết</a>
                        </li>

                        <li class="slide">
                            <a href="{{ route('admin.post.index') }}" class="side-menu__item">Bài Viết</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.post.create') }}" class="side-menu__item"> Tạo Bài Viết</a>
                        </li>
                    </ul>
                </li>
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-grid-alt side-menu__icon"></i>
                        <span class="side-menu__label">Danh Mục</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Danh Mục</a>
                        </li>

                        <li class="slide">
                            <a href="{{ route('admin.post-category.index') }}" class="side-menu__item">Danh Mục</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.post-category.create') }}" class="side-menu__item"> Tạo Danh Mục</a>
                        </li>
                    </ul>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-grid-alt side-menu__icon"></i>
                        <span class="side-menu__label">Tag</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Tag</a>
                        </li>

                        <li class="slide">
                            <a href="{{ route('admin.post-tag.index') }}" class="side-menu__item">Tag</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.post-tag.create') }}" class="side-menu__item"> Tạo Tag</a>
                        </li>
                    </ul>
                </li>
                {{-- ! Client --}}
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Người Tiêu Dùng</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-bar-chart-square side-menu__icon"></i>
                        <span class="side-menu__label">Khách Hàng</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Khách Hàng</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.customer.create') }}" class="side-menu__item">Thêm Khách
                                Hàng</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.customer.index') }}" class="side-menu__item">Xem Danh Sách</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-bar-chart-square side-menu__icon"></i>
                        <span class="side-menu__label">Gian Hàng</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Gian Hàng</a>
                        </li>

                        <li class="slide">
                            <a href="{{ route('admin.vendor.create') }}" class="side-menu__item">Thêm Gian Hàng</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.user_relationship.index') }}" class="side-menu__item">Đăng Ký
                                Gian Hàng</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.vendor.index') }}" class="side-menu__item">Xem Danh Sách</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
                {{-- ! End Client --}}


                {{-- !  Staft --}}
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Nhân Viên</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-bar-chart-square side-menu__icon"></i>
                        <span class="side-menu__label">Nhân Viên</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Nhân Viên</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.user.create') }}" class="side-menu__item">Thêm Nhân Viên</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.user.index') }}"" class="side-menu__item">Xem Danh Sách</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
                {{-- ! End Staft --}}


                {{-- !  Admin --}}
                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('admin.admin.index') }}" class="side-menu__item">
                        <i class="bx bx-bar-chart-square side-menu__icon"></i>
                        <span class="side-menu__label">Danh Sách Admin</span>
                    </a>
                </li>
                <!-- End::slide -->
                {{-- ! End  Admin --}}

                {{-- ! Auth --}}
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Xác Thực Người Dùng</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-bar-chart-square side-menu__icon"></i>
                        <span class="side-menu__label">Nhóm Quyền</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Nhóm Quyền</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.user_role.index') }}" class="side-menu__item">Đăng Ký
                                Quyền</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.role.index') }}" class="side-menu__item">Danh Sách</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-bar-chart-square side-menu__icon"></i>
                        <span class="side-menu__label">Chức Năng</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Chức Năng</a>
                        </li>

                        <li class="slide">
                            <a href="{{ route('admin.permission.index') }}" class="side-menu__item">Danh Sách</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.role_permission.index') }}" class="side-menu__item">Đăng Ký
                                Nhóm Quyền</a>
                        </li>

                    </ul>
                </li>
                <!-- End::slide -->
                {{-- ! End Auth --}}



                {{-- ! Order --}}
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Doanh Thu</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-bar-chart-square side-menu__icon"></i>
                        <span class="side-menu__label">Gian Hàng</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Gian Hàng</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.role.index') }}" class="side-menu__item">Danh Sách</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.role.index') }}" class="side-menu__item">Lợi Nhuận</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-bar-chart-square side-menu__icon"></i>
                        <span class="side-menu__label">Đơn Hàng</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Đơn Hàng</a>
                        </li>

                        <li class="slide">
                            <a href="{{ route('admin.permission.index') }}" class="side-menu__item">Danh Sách</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.role_permission.index') }}" class="side-menu__item">Tạo Đơn
                                Hàng Mới</a>
                        </li>

                    </ul>
                </li>
                <!-- End::slide -->
                {{-- ! End Order --}}

            </ul>

            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
