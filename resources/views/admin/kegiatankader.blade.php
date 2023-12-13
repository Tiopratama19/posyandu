@extends('Template.templateadmin')
@push('title')
    POSYANDU | Kegiatan Kader
@endpush

@push('css')
    {{-- <link href="{{ asset('template1/theme/assets/libs/%40fullcalendar/core/main.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('template1/theme/assets/libs/%40fullcalendar/daygrid/main.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('template1/theme/assets/libs/%40fullcalendar/bootstrap/main.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('template1/theme/assets/libs/%40fullcalendar/timegrid/main.min.css') }}" rel="stylesheet"
        type="text/css" /> --}}
@endpush

@section('content')
    <div class="page-content">
        
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Kegiatan Kader</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                                <li class="breadcrumb-item active">Jumlah Kegiatan</li>
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
                                <h4 class="card-title">Tabel Kegiatan Kader</h4>
                                <p class="card-title-desc">Pastikan kegiatan yang dimasukkan itu sudah tepat dan benar.</p>
                                <span style="float:right">
                                    <a href="/admin/tambahkegiatan" class="btn btn-primary">Tambah Kegiatan</a>
                                </span>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-info" role="alert">
                                    {{ $message }};
                                </div>
                            @endif
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th width="150px">Tanggal</th>
                                            <th width="150px">Nama</th>
                                            <th width="150px">Jabatan</th>
                                            <th>Uraian Kegiatan</th>
                                            <th width="150px">Aksi</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $index => $row)
                                        <tbody>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $row->Tanggal }}</td>
                                            <td>{{ $row->Nama }}</td>
                                            <td>{{ $row->Jabatan }}</td>
                                            <td>{{ $row->UraianKegiatan }}</td>
                                            <td>
                                                <a href="/admin/tampilkegiatan/{{ $row->id }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="#" class="btn btn-danger delete"
                                                    data-id="{{ $row->id }}" data-nama="{{ $row->Nama }}">Hapus</a>
                                                <!-- /deletedata/{{ $row->id }} -->
                                            </td>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <!-- end cardaa -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->

    </div>
@endsection

@push('scripts')
    <!-- Required datatable js -->
    <!-- was delete -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script> -->
    <script>
        $('.delete').click(function() {

            var kegiatanid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

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
                    window.location = "/admin/deletekegiatan/" + kegiatanid + ""
                    swalWithBootstrapButtons.fire(
                        'Dihapus!',
                        'Filemu berhasil dihapus.',
                        'success'
                    )
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
@endpush

@push('scripts')
    <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('template1/theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/feather-icons/feather.min.js') }}"></script>
        <!-- pace js -->
        <script src="{{ asset('template1/theme/assets/libs/pace-js/pace.min.js') }}"></script>

        {{-- <!-- Required datatable js -->
        <script src="{{ asset('template1/theme/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script> --}}

        <!-- Responsive examples -->
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js' ) }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('template1/theme/assets/js/pages/datatables.init.js') }}"></script>    

        <script src="{{ asset('template1/theme/assets/js/app.js' ) }}"></script>
@endpush