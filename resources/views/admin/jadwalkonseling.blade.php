@extends('Template.templateadmin')
@push('title')
    POSYANDU | Jadwal Konseling
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
                        <h4 class="mb-sm-0 font-size-18">Jadwal Konseling</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                                <li class="breadcrumb-item active">Jumlah Jadwal</li>
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
                                <h4 class="card-title">Tabel Jadwal Konseling</h4>
                                <p class="card-title-desc">Pastikan waktu yang dimasukkan itu sudah tepat dan benar.</p>
                                <span style="float:right">
                                    <a href="/admin/tambahjadwal" class="btn btn-primary">Tambah Data</a>
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
                                            <th width="150px">Tanggal Kegiatan</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Nama Bidan</th>
                                            <th width="150px">Aksi</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $index => $row)
                                        <tbody>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $row->TanggalKegiatan }}</td>
                                            <td>{{ $row->NamaKegiatan }}</td>
                                            <td>{{ $row->NamaBidan }}</td>
                                            <td>
                                                <a href="/admin/tampiljadwal/{{ $row->id }}"
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

            var jadwalid = $(this).attr('data-id');
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
                    window.location = "/admin/deletejadwal/" + jadwalid + ""
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