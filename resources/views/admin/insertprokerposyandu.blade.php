@extends('Template.templateadmin')

@push('title')
POSYANDU | Input Proker Posyandu
@endpush

@push('css')

@endpush

@section('content')

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
                        <span style="float:right">
                            <a href="/admin/prokerposyandu" class="btn btn-danger">Kembali</a>
                        </span>
                    </div>
                    <div class="card-body p-4">

                        <div class="row">
                            <form id="insertproker" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="example-tel-input" class="form-label">Tipe</label>
                                        <select class="form-select" name="Status" aria-label="JenisKelamin" onchange="handleSelectChange(event)">
                                            <option selected>Pilih Salah Satu</option>
                                            <option value="Proker">Kegiatan</option>
                                            <option value="Edukasi">Edukasi</option>
                                        </select>
                                        {{-- <input class="form-control" name="JenisKelamin" type="text" value="" id="example-tel-input"> --}}
                                    </div>

                                    <div class="">
                                        <input type="hidden" name="id"  id="id">
                                    </div>
                                    <div class="mb-3" id="nama">
                                        <label for="example-text-input" class="form-label">Edukasi</label>
                                        <input class="form-control" name="Nama" type="text" value=""
                                            id="example-text-input">
                                    </div>

                                    <div class="mb-3" id="kegiatan">
                                        <label for="example-text-input" class="form-label">Kegiatan</label>
                                        <input class="form-control" name="Kegiatan" type="text" value=""
                                            id="example-text-input">
                                    </div>
                                    <div class="mb-3" id="tanggal">
                                        <label for="example-text-input" class="form-label">Tanggal</label>
                                        <input class="form-control" name="Tanggal" type="date" value=""
                                            id="example-text-input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Caption</label>
                                        <textarea class="form-control" id="Caption" placeholder="Enter the Caption"
                                            rows="5" name="Caption"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <img src="{{ asset('1200px-No_Preview_image_2.png') }}" width="200" height="200"
                                            class="image_preview">

                                        <div class="form-group mt-3">
                                            <input class="form-control" type="file" name="image" id="image">
                                        </div>
                                    </div>
                                    <br>
                                    <button style="float: right;" type="Submit" class="btn btn-success">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
@include('admin.js.image-upload-js')
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



    });

</script>
<script>
     function handleSelectChange(event) {
            // Ambil nilai yang dipilih
            var selectedValue = event.target.value;
            // Lakukan sesuatu dengan nilai yang dipilih
           if (selectedValue == 'Proker') {
                $("#nama").hide();
                $("#tanggal").show();
                $("#kegiatan").show();
           } else if(selectedValue == 'Edukasi') {
                $("#nama").show();
                $("#tanggal").hide();
                $("#kegiatan").hide();
           }
        }

    ClassicEditor
        .create(document.querySelector('#Caption'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

</script>
@endpush
