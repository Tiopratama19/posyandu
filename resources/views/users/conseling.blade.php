@push('css')
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">

    <style>
        .icon-holder {
            border-radius: 4px;
            background-color: #5ca1e1;
            border: none;
            color: #fff;
            text-align: center;
            font-size: 32px;
            padding: 16px;
            width: 220px;
            transition: all 0.5s;
            cursor: pointer;
            box-shadow: 0 10px 20px -8px rgba(0, 0, 0, .7);
        }

        .icon-holder {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .icon-holder:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 14px;
            right: -20px;
            transition: 0.5s;
        }

        .icon-holder:hover {
            padding-right: 24px;
            padding-left: 8px;
        }

        .icon-holder:hover:after {
            opacity: 1;
            right: 10px;
        }
    </style>

    <link href="{{ asset('alert/css/sweetalert2.css') }} " rel="stylesheet" />
@endpush

<section class="timeline-section section-padding" id="section_3">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h2 class="text-white mb-4">Jadwal Konseling
            </div>

            <div class="col-lg-10 col-12 mx-auto">
                <div class="timeline-container">
                    <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                        <div class="list-progress">
                            <div class="inner"></div>
                        </div>
                        @if (!empty($counseling))
                            @foreach ($counseling as $item)
                                <li>
                                    <div class="">
                                        <h4 class="text-white mb-3" style="float: left;">{{ $item->NamaKegiatan }}</h4>
                                        <h4 class="text-white mb-3" style="float: right;">{{ $item->NamaBidan }} /
                                            {{ Carbon\Carbon::parse($item->TanggalKegiatan)->isoFormat('dddd, D MMMM Y') }}
                                        </h4>
                                    </div>
                                    <br>
                                    <div class="icon-holder">
                                        <i class="bi bi-calendar-check" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal-{{ $item->id }}"></i>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 60%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Jadwal Konseling</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab"
                                        href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0"
                                        aria-selected="true">Daftar</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1"
                                        role="tab" aria-controls="simple-tabpanel-1"
                                        aria-selected="false">Peserta</a>
                                </li>
                            </ul>
                            <div class="tab-content pt-5" id="tab-content">
                                <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel"
                                    aria-labelledby="simple-tab-0">

                                    <form action="javascript:void(0)" id="data-master" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nik</label>
                                            <input type="text" name="nik" id="nik" class="form-control"
                                                pattern="\d{16}" onkeypress="return hanyaAngka(event)" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                            <div id="emailHelp" class="form-text">Kami tidak akan pernah membagikan
                                                email Anda kepada orang lain.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" id="simpan-data" class="btn btn-primary">Simpan <i
                                                    class="fas fa-save"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel"
                                    aria-labelledby="simple-tab-1">
                                    <table id="datatable"
                                        class="table table-striped dt-responsive nowrap w-100 display nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nik</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <!-- Required datatable js -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/template1/theme/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js">
    </script>
    <!-- Responsive examples -->
    <script src="{{ asset('template1/theme/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('template1/theme/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>

    <script src="{{ URL::to('alert/js/sweetalert.js') }}"></script>
    <script type="text/javascript">
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        function harusHuruf(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32)
                return false;
            return true;
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            var id = `{{ $item->id }}`;

            var table = $('#datatable').dataTable({
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
                ajax: `{{ url('getpeserta') }}/${id}`,
                deferRender: true,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                ]
            });

            function reset() {
                $('input').val('');
            }

            $('#data-master').on('submit', function(e) {
                e.preventDefault();
                $('#simpan-data').html("Menyimpan...");
                $('#simpan-data').attr('disabled', true);
                let data = $("#data-master").serialize();
                let datax = new FormData(this);
                // console.log(data[0].jenis_menu);
                console.log(data);
                $.ajax({
                    type: "post",
                    url: `{{ url('tambahpeserta') }}/${id}`,
                    data: datax,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#simpan-data').html("Simpan");
                        $('#simpan-data').removeAttr('disabled');
                        $("#modelId").modal('hide');
                        reset();
                        if (response.status == 1) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Berhasil Menambah Data !',
                            });
                        } else if (response.status == 2) {
                            Toast.fire({
                                icon: 'warning',
                                title: 'Data Sudah Terdaftar'
                            });
                        }
                    },
                    error: function(e) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Gagal menyimpan data !'
                        });
                        $('#simpan-data').html(`Simpan <i
                    class="fas fa-save"></i>`);
                        $('#simpan-data').removeAttr('disabled');

                    }
                });
            });
        });
    </script>
@endpush
