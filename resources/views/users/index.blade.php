@extends('users.layouts.master')


@push('title')
    USERS | HOME
@endpush


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
        box-shadow: 0 10px 20px -8px rgba(0, 0, 0,.7);
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

    .icon-holder:hover{
        padding-right: 24px;
        padding-left:8px;
    }

    .icon-holder:hover:after {
        opacity: 1;
        right: 10px;
    }
</style>

<link href="{{ asset('alert/css/sweetalert2.css')}} " rel="stylesheet" />
@endpush


@section('content')
    @include('users.home')
    @include('users.education')
    @include('users.conseling')
    @include('users.kader')
    @include('users.kegiatan')
    @include('users.about')
    @include('users.contact')
@endsection


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

    $(document).ready(function () {
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

        let idPeserta = $("#idPeserta2").val();

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
            ajax: `{{url('admin/getpeserta')}}/${idPeserta}`,
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

        function reset()
        {
            $('input').val('');
        }

        $('#data-master').on('submit', function (e) {
            e.preventDefault();
            $('#simpan-data').html("Menyimpan...");
            $('#simpan-data').attr('disabled', true);
            let data = $("#data-master").serialize();
            let datax = new FormData(this);
            let id = $("#idPeserta").val();
            // console.log(data[0].jenis_menu);
            console.log(data);
            $.ajax({
                type: "post",
                url: `{{url('admin/tambahpeserta')}}/${id}`,
                data: datax,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
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
                error: function (e) {
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
