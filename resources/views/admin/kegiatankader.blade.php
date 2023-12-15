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
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
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
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100 display nowrap"
                            style="width:100%">
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
                            <tbody>

                                @php
                                $no = 1;
                                @endphp
                                @foreach ($data as $index => $row)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $row->Tanggal }}</td>
                                    <td>{{ $row->Nama }}</td>
                                    <td>{{ $row->Jabatan }}</td>
                                    <td>{{ $row->UraianKegiatan }}</td>
                                    <td>
                                        <a href="/admin/tampilkegiatan/{{ $row->id }}" class="btn btn-info">Edit</a>
                                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                            data-nama="{{ $row->Nama }}">Hapus</a>
                                        <!-- /deletedata/{{ $row->id }} -->
                                    </td>

                                    @endforeach
                                </tr>
                            </tbody>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
<!-- Required datatable js -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/')}}/template1/theme/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Responsive examples -->
<script src="{{ asset('template1/theme/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('template1/theme/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js' ) }}">
</script>

<!-- Datatable init js -->
<script src="{{ asset('template1/theme/assets/js/pages/datatables.init.js') }}"></script>
<!-- <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script> -->
<script>
    $('.delete').click(function () {

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
