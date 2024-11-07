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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap Css -->
    <!-- Icons Css -->
    <link href="{{ asset('template1/theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('template1/theme/assets/css/app.min.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('alert/css/sweetalert2.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
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

        {{-- <footer class="footer">
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
        </footer> --}}
    </div>


    <!-- Right Sidebar -->
    @include('Template.rightSidebar')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JAVASCRIPT -->
    <script src="{{ URL::to('template1/theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="{{ URL::to('template1/theme/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::to('template1/theme/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::to('template1/theme/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ URL::to('template1/theme/assets/libs/feather-icons/feather.min.js') }}"></script>
    <!-- pace js -->
    <script src="{{ URL::to('template1/theme/assets/libs/pace-js/pace.min.js') }}"></script>


    <script src="{{ URL::to('alert/js/sweetalert.js') }}"></script>
    <!-- apexcharts -->
    <script src="{{ URL::to('template1/theme/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Plugins js-->
    <script
        src="{{ URL::to('template1/theme/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}">
    </script>
    <script
        src="{{ URL::to('template1/theme/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
    </script>


    <script src="{{ URL::to('template1/theme/assets/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::to('template1/theme/assets/js/app.js') }}"></script>

    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();

            var url = $(this).attr('data-url');

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Anda tidak akan dapat mengembalikannya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, gajadi!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent().submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Gajadi',
                        'Filemu aman :)',
                        'error'
                    )
                }
            })

        });
    </script>

    <!-- dashboard init -->
    @stack('scripts')
</body>

</html>
