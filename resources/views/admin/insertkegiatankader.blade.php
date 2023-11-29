@extends('Template.templateadmin')
@section('content')

@push('title')
POSYANDU | Input Kegiatan Kader
@endpush

@push('css')
    <!-- DataTables -->
    <link href="{{ asset('template1/themelibs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('template1/themelibs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('template1/themelibs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endpush

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Tambah Data</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Basic Elements</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Silahkan Tambah Data</h4>
                                        <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each
                                            textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>
                                        <span style="float:right">
                                        <a href="/admin/kegiatankader" class="btn btn-danger">Kembali</a>
                                        </span>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <form action="/admin/insertkegiatan" method="POST">
                                            @csrf
                                            <div class="col-lg-6">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Tanggal</label>
                                                        <input class="form-control" name="Tanggal" type="date" value="" id="example-text-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-search-input" class="form-label">Nama</label>
                                                        <input class="form-control" name="Nama" type="text" value="" id="example-search-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-search-input" class="form-label">Jabatan</label>
                                                        <input class="form-control" name="Jabatan" type="text" value="" id="example-search-input">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-email-input" class="form-label">Uraian Kegiatan</label>
                                                        <input class="form-control" name="UraianKegiatan" type="text" value="" id="example-email-input">
                                                    </div>
                                                    <span style="float:right">
                                                        <button type="Submit" class="btn btn-success">Submit</button>
                                                    </span>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>Posyandu.write(new Date().getFullYear())</script> © Admin.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Desain & Develop by <a href="#!" class="text-decoration-underline">Tio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
@endsection

    @push('scripts')
        <script src="{{ asset('template1/themelibs/jquery/jquery.min') }}"></script>
        <script src="{{ asset('template1/themelibs/bootstrap/js/bootstrap.bundle.min') }}"></script>
        <script src="{{ asset('template1/themelibs/metismenu/metisMenu.min') }}"></script>
        <script src="{{ asset('template1/themelibs/simplebar/simplebar.min') }}"></script>
        <script src="{{ asset('template1/themelibs/node-waves/waves.min') }}"></script>
        <script src="{{ asset('template1/themelibs/feather-icons/feather.min') }}"></script>
        <!-- pace js -->
        <script src="{{ asset('template1/themelibs/pace-js/pace.min') }}"></script>
        <script src="{{ asset('template1/themejs/app') }}"></script> 
    @endpush