@extends('Template.templateadmin')
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
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
@endpush

@section('content')
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
                        {{-- <div class="col-sm-2">
                                    <label for="" class="form-label">Nama</label>
                                    <input name="Nama" type="text" class="form-control" placeholder="Nama" value="{{isset($_GET['Nama']) ? $_GET['Nama'] : ''}}">
                    </div>
                    <div class="col-sm-2">
                        <label for="" class="form-label">NIK</label>
                        <input name="NIK" type="text" class="form-control" placeholder="NIK"
                            value="{{isset($_GET['NIK']) ? $_GET['NIK'] : ''}}">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                    </div> --}}
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
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    {{-- <th>BB</th>
                                            <th>TB</th>
                                            <th>TTD</th>
                                            <th>LILA</th>
                                            <th>LP</th>
                                            <th>Anemia</th> --}}
                                    <th width="230px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                $no = 1;
                                @endphp
                                @foreach ($data as $index => $row)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $row->NIK }}</td>
                                    <td>{{ $row->Nama }}</td>
                                    <td>{{ $row->TempatLahir }}</td>
                                    <td>{{ $row->TanggalLahir }}</td>
                                    <td>{{ $row->JenisKelamin }}</td>
                                    {{-- <td>{{ $row->BB }}</td>
                                    <td>{{ $row->TB }}</td>
                                    <td>{{ $row->TTD }}</td>
                                    <td>{{ $row->LILA }}</td>
                                    <td>{{ $row->LP }}</td>
                                    <td>{{ $row->Anemia }}</td> --}}
                                    <td>
                                        <a href="/admin/tampildata/{{ $row->id }}" class="btn btn-info">Edit</a>
                                        <a href="/admin/riwayat/{{ $row->id }}" class="btn btn-primary">Riwayat</a>
                                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                            data-nama="{{ $row->Nama }}">Hapus</a>
                                        <!-- /deletedata/{{ $row->id }} -->
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
</div> <!-- End Page-content -->
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
    $(document).ready(function () {
        let minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        DataTable.ext.search.push(function (settings, data, dataIndex) {
            let min = minDate.val();
            let max = maxDate.val();
            let date = new Date(data[4]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        });

        // DataTables initialisation
        let table = new DataTable('#datatable');
        // Create date inputs
        minDate = new DateTime('#min', {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime('#max', {
            format: 'MMMM Do YYYY'
        });
        // Refilter the table
        document.querySelectorAll('#min, #max').forEach((el) => {
            el.addEventListener('change', () => table.draw());
        });
    });
    $('.delete').click(function () {

        var remajaid = $(this).attr('data-id');
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
            text: 'Anda tidak akan dapat mengembalikannya!',
            icon: 'warning',
            showCancelButton: true,
            buttonsStyling: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak, gajadi!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/admin/deletedata/" + remajaid + ""
                swalWithBootstrapButtons.fire(
                    'Dihapus!',
                    'Filemu berhasil dihapus.',
                    'Sukses'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Tidak Jadi',
                    'File Aman',
                    'Error'
                )
            }
        })

    });

</script>
@endpush
