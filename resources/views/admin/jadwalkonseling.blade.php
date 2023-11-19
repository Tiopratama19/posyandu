@extends('Template.templateadmin')
@section('content')
    @push('title')
        POSYANDU | Jadwal Konseling
    @endpush
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Jadwal Konseling</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Jadwal Konseling</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-grid">
                                    </div>
                                    <div id="external-events" class="mt-2">
                                        <br>
                                        <p class="text-muted" style="font-size:15px">Klik kolom lalu tambahkan jadwal
                                            konseling</p>
                                    </div>
                                    <div class="row justify-content-center mt-5">
                                        <div class="col-lg-12 col-sm-6">
                                            <img src="{{ asset('template1/theme/assets/images/undraw-calendar.svg') }}"
                                                alt="" class="img-fluid d-block">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                        <div class="col-xl-9 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <div style='clear:both'></div>
                    <!-- Add New Event MODAL -->
                    <div class="modal fade" id="event-modal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header py-3 px-4 border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-hidden="true"></button>
                                </div>
                                <div class="modal-body p-4">
                                    <form class="needs-validation" name="event-form"
                                        action="{{ url('admin/conseling/createOrUpdate') }}" method="post" id="form-event"
                                        novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Kegiatan</label>
                                                    <input class="form-control" placeholder="Masukan nama kegiatan "
                                                        type="text" name="name" id="event-title" required
                                                        value="" />
                                                    <div class="invalid-feedback">Mohon masukkan nama kaegiatan yang benar
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Kategori</label>
                                                    <select class="form-control form-select" name="category"
                                                        id="event-category">
                                                        <option selected> --Pilih-- </option>
                                                        <option value="0">Kesehatan Mental</option>
                                                        <option value="1">Kesehatan Fisik</option>
                                                        <option value="2">Kesehatan Sosial</option>
                                                        <option value="3">Kesehatan</option>
                                                        <option value="4">Kesehatan Spiritual</option>
                                                        <option value="5">Kesehatan Reproduksi</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a valid event category
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id">
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-danger"
                                                    id="btn-delete-event">Hapus</button>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="button" class="btn btn-light me-1"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success"
                                                    id="btn-save-event">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end modal-content-->
                        </div> <!-- end modal dialog-->
                    </div><!-- end modal-->
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection

@push('css')
    <link href="{{ asset('template1/theme/assets/libs/%40fullcalendar/core/main.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('template1/theme/assets/libs/%40fullcalendar/daygrid/main.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('template1/theme/assets/libs/%40fullcalendar/bootstrap/main.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('template1/theme/assets/libs/%40fullcalendar/timegrid/main.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush

@push('scripts')
    <script src="{{ asset('template1/theme/assets/libs/%40fullcalendar/core/main.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/%40fullcalendar/bootstrap/main.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/%40fullcalendar/daygrid/main.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/%40fullcalendar/timegrid/main.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/%40fullcalendar/interaction/main.min.js') }}"></script>

    <!-- Calendar init -->
    <script src="{{ asset('template1/theme/assets/js/pages/calendar.init.js') }}"></script>


    <script>
        $(document).ready(function() {
            var SITEURL = "{{ url('/admin/') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                editable: true,
                events: SITEURL + "/conseling/",
                displayEventTime: true,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(event_start, event_end, allDay) {
                    var event_name = prompt('Event Name:');
                    if (event_name) {
                        var event_start = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
                        var event_end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: SITEURL + "/calendar-crud-ajax",
                            data: {
                                event_name: event_name,
                                event_start: event_start,
                                event_end: event_end,
                                type: 'create'
                            },
                            type: "POST",
                            success: function(data) {
                                displayMessage("Event created.");
                                calendar.fullCalendar('renderEvent', {
                                    id: data.id,
                                    title: event_name,
                                    start: event_start,
                                    end: event_end,
                                    allDay: allDay
                                }, true);
                                calendar.fullCalendar('unselect');
                            }
                        });
                    }
                },
                eventDrop: function(event, delta) {
                    var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                    $.ajax({
                        url: SITEURL + '/calendar-crud-ajax',
                        data: {
                            title: event.event_name,
                            start: event_start,
                            end: event_end,
                            id: event.id,
                            type: 'edit'
                        },
                        type: "POST",
                        success: function(response) {
                            displayMessage("Event updated");
                        }
                    });
                },
                eventClick: function(event) {
                    var eventDelete = confirm("Are you sure?");
                    if (eventDelete) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/calendar-crud-ajax',
                            data: {
                                id: event.id,
                                type: 'delete'
                            },
                            success: function(response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event removed");
                            }
                        });
                    }
                }
            });
        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    </script>
@endpush
