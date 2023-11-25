@extends('Template.templateadmin')
@section('content')

@push('title')
POSYANDU | Data Remaja
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


                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Data Remaja</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                                            <li class="breadcrumb-item active">Jumlah Remaja</li>
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
                                                        <h4 class="card-title">Tabel Data Remaja</h4>
                                                        <p class="card-title-desc">Pastikan data yang dimasukkan itu sudah tepat dan benar.</p>
                                                        <span style="float:right">
                                                        <a href="/admin/tambah" class="btn btn-primary">Tambah Data</a>
                                                        </span>
                                                    </div>
                                                    <div class="card-body">
                                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>NIK</th>
                                                                <th>Nama</th>
                                                                <th>Tempat Lahir</th>
                                                                <th>Tanggal Lahir</th>
                                                                <th>Jenis Kelamin</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
<<<<<<< HEAD
=======
                                                            @foreach ($tampildata as $dataremaja)
                                                            <tr>
                                                                <td>{{$dataremaja->NIK}}</td>
                                                                <td>{{$dataremaja->Nama}}</td>
                                                                <td>{{$dataremaja->TempatLahir}}</td>
                                                                <td>{{$dataremaja->TanggalLahir}}</td>
                                                                <td>{{$dataremaja->JenisKelamin}}</td>
                                                                <td></td>
                                                            </tr>
                                                            @endforeach
>>>>>>> 48320a422d02936647f22e350bb1e7ee72f96375
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

        <script>
            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var table = $('#datatable-buttons').dataTable({
                    autoWidth: true,
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    responsive: true,
                    language: {
                        processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                        sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                        sLengthMenu: "Tampilkan _MENU_ Baris",
                        sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                        sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                        sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                        sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                        sInfoPostFix: "",
                        sSearch: "Cari:",
                        sUrl: "",
                        oPaginate: {
                            sFirst: "Pertama",
                            sPrevious: "Sebelumnya",
                            sNext: "Selanjutnya",
                            sLast: "Terakhir",
                        },
                    },
                    stateSave: true,
                    order: [],
                    ajax: `{{ url('admin/dataremaja') }}`,
                    deferRender: true,
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'NIK',
                            name: 'NIK'
                        },
                        {
                            data: 'Nama',
                            name: 'Nama'
                        },
                        {
                            data: 'TempatLahir',
                            name: 'TempatLahir'
                        },
                        {
                            data: 'TL',
                            name: 'TL'
                        },
                        {
                            data: 'JenisKelamin',
                            name: 'JenisKelamin'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                });
            });
        </script>
    @endpush
