

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
                                        <h4 class="text-white mb-3" style="float: right;">{{ $item->NamaBidan }} / {{ Carbon\Carbon::parse($item->TanggalKegiatan)->isoFormat('dddd, D MMMM Y') }} </h4>
                                    </div>
                                    <br>
                                    <div class="icon-holder">
                                        <i class="bi bi-calendar-check"></i>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <!-- {{-- <div class="col-12 text-center mt-5">
                <p class="text-white">
                    Want to learn more?
                    <a href="#" class="btn custom-btn custom-border-btn ms-3">Check out Youtube</a>
                </p>
            </div> --}} -->
        </div>
    </div>
</section>
