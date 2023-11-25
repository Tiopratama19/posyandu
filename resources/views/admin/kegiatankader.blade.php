@extends('Template.templateadmin')

@push('title')
POSYANDU | Kegiatan Kader
@endpush

@push('css')
    <!-- DataTables -->
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endpush
@section('content')


    <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Kegiatan Kader</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                                            <li class="breadcrumb-item active">Data Kader</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Tabel Kader</h4>
                                                        <p class="card-title-desc">Masukkan kegiatan kader dengan tepat dan benar.</p>
                                                        <span style="float:right">
                                                        <a href="/admin/tambahkegiatan" class="btn btn-primary">Tambah Data</a>
                                                        </span>
                                                    </div>
                                                    <div class="card-body">
                                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                            <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Nama</th>
                                                                <th>Jabatan</th>
                                                                <th class="w-50">Uraian Kegiatan</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($tampildatakegiatan as $datakegiatan)
                                                            <tr>
                                                                <td>{{$datakegiatan->Tanggal}}</td>
                                                                <td>{{$datakegiatan->Nama}}</td>
                                                                <td>{{$datakegiatan->Jabatan}}</td>
                                                                <td>{{$datakegiatan->UraianKegiatan}}</td>
                                                                <td>
                                                                    <a href="" class="btn btn-primary">Edit</a>
                                                                    <span style="float:right">
                                                                    <a href="" class="btn btn-danger">Hapus</a>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- end cardaa -->
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div> <!-- container-fluid -->
                </div>
        <!-- End Page-content -->
    @endsection


    @push('scripts')
        <!-- Required datatable js -->
        <script src="{{ asset('template1/theme/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}">
        </script>
        <script src="{{ asset('template1/theme/assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
        </script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
        </script>

        <!-- Datatable init js -->
        <script src="{{ asset('template1/theme/assets/js/pages/datatables.init.js') }}"></script>
    @endpush
