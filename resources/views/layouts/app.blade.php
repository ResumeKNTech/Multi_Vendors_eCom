<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    @include('layouts.blocks.head')

</head>

<body>

    <!-- SWITCHER -->

    @include('layouts.blocks.switcher')
    <!-- END SWITCHER -->

    <!-- LOADER -->
    @include('layouts.blocks.loader')
    <!-- END LOADER -->

    <!-- PAGE -->
    <div class="page">

        <!-- HEADER -->

        @include('layouts.blocks.header')
        <!-- END HEADER -->

        <!-- SIDEBAR -->

        @include('layouts.blocks.sidebar')


        <!-- END SIDEBAR -->

        <!-- MAIN-CONTENT -->

        <div class="main-content app-content">


            <div class="container-fluid">

                <!-- Page Header -->
                @include('layouts.blocks.main-content.page-header')
                <!-- Page Header Close -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <p class="alert alert-info">{{ Session::get('success') }}</p>
                @endif
                @if (Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif

                <!-- Start::row-->
                <div class="row">
                    @yield('content')
                </div>
                <!--End::row -->



            </div>


        </div>
        <!-- END MAIN-CONTENT -->

        <!-- SEARCH-MODAL -->

        @include('layouts.blocks.search-modal')
        <!-- END SEARCH-MODAL -->

        <!-- FOOTER -->

        @include('layouts.blocks.footer')
        <!-- END FOOTER -->

    </div>
    <!-- END PAGE-->

    <!-- SCRIPTS -->



    <!-- SCROLL-TO-TOP -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>


    @include('layouts.blocks.foot')
</body>


</html>
