<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@stack('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('template1/theme/assets/images/logoposyandu1.png') }}">

    <!-- plugin css -->
    <link href="{{ asset('template1/theme/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('template1/theme/assets/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('template1/theme/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('template1/theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('template1/theme/assets/css/app.min.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('alert/css/sweetalert2.css')}} " rel="stylesheet" />

    @stack('css')

</head>

<body data-topbar="dark">
    @include('Template.header')

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            @include('Template.sidebar')
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <div class="main-content">
        @include('Template.flashMessage')
        @yield('content')
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Posyandu.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by <a href="#!" class="text-decoration-underline">Tio Pratama</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->


    <!-- Right Sidebar -->
    @include('Template.rightSidebar')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('template1/theme/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/feather-icons/feather.min.js') }}"></script>
    <!-- pace js -->
    <script src="{{ asset('template1/theme/assets/libs/pace-js/pace.min.js') }}"></script>


    <!-- App js -->
    <script src="{{ asset('template1/theme/assets/js/app.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('template1/theme/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Plugins js-->
    <script
        src="{{ asset('template1/theme/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}">
    </script>
    <script
        src="{{ asset('template1/theme/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
    </script>


    <script src="{{ asset('alert/js/sweetalert.js') }}"></script>
    <!-- dashboard init -->
    @stack('scripts')
</body>

</html>
