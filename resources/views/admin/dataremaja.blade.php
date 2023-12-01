@extends('Template.templateadmin')
@section('content')
    @push('title')
        POSYANDU | Data Remaja
    @endpush

    @push('css')
        <!-- DataTables -->
        <!-- <link href="{{ asset('template1/theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
            rel="stylesheet" type="text/css" />
        <link href="{{ asset('template1/theme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
            rel="stylesheet" type="text/css" /> -->

        <!-- Responsive datatable examples -->
        <!-- <link href="{{ asset('template1/theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
            rel="stylesheet" type="text/css" /> -->
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
                            @if($message = Session::get('success'))
                            <div class="alert alert-info" role="alert">
                                {{$message}};
                            </div>
                            @endif
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
                                            <th>BB</th>
                                            <th>TB</th>
                                            <th>TTD</th>
                                            <th>LILA</th>
                                            <th>LP</th>
                                            <th>Anemia</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $index => $row)
                                    <tbody>
                                    <th scope="row">{{$no++ }}</th>
                                        <td>{{$row->NIK}}</td>
                                        <td>{{$row->Nama}}</td>
                                        <td>{{$row->TempatLahir}}</td>
                                        <td>{{$row->TanggalLahir}}</td>
                                        <td>{{$row->JenisKelamin}}</td>
                                        <td>{{$row->BB}}</td>
                                        <td>{{$row->TB}}</td>
                                        <td>{{$row->TTD}}</td>
                                        <td>{{$row->LILA}}</td>
                                        <td>{{$row->LP}}</td>
                                        <td>{{$row->Anemia}}</td>
                                        <td>
                                            <a href="/admin/tampildata/{{$row->id}}" class="btn btn-info">Edit</a>
                                            <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}" data-nama="{{$row->Nama}}">Hapus</a>
                                            <!-- /deletedata/{{$row->id}} -->
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
        <!-- End Page-content -->
    @endsection

@push('scripts')
        <!-- Required datatable js -->
        <!-- was delete -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script>
  @if(Session::has('success'))
  toastr.success("{{Session::get('success')}}")
  @endif
</script> -->
<script>

$('.delete').click( function() {

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
  text: "Anda tidak akan dapat mengembalikannya!Data pegawai dengan nama "+nama+" ",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Ya, hapus!',
  cancelButtonText: 'Tidak, gajadi!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    window.location="/admin/deletedata/"+remajaid+""
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
