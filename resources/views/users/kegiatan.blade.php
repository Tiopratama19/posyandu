<section class="explore-section section-padding" id="section_5">
    <div class="container">
        <div class="col-12 text-center">
            <h2 class="mb-4">Informasi Kegiatan</h1>
        </div>

    </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="design1-tab" data-bs-toggle="tab"
                        data-bs-target="#design1-tab-pane" type="button" role="tab" aria-controls="design1-tab-pane"
                        aria-selected="true">Penyuluhan</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="marketing1-tab" data-bs-toggle="tab"
                        data-bs-target="#marketing1-tab-pane" type="button" role="tab"
                        aria-controls="marketing-tab-pane" aria-selected="false">Pembinaan
                        Mental</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="finance1-tab" data-bs-toggle="tab" data-bs-target="#finance1-tab-pane"
                        type="button" role="tab" aria-controls="finance-tab-pane"
                        aria-selected="false">Pemeriksaan
                        Kesehatan</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="music1-tab" data-bs-toggle="tab" data-bs-target="#music1-tab-pane"
                        type="button" role="tab" aria-controls="music-tab-pane" aria-selected="false">Kunjungan
                        Ke Rumah</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="design1-tab-pane" role="tabpanel"
                            aria-labelledby="design-tab" tabindex="0">
                            <div class="row">
                                @foreach ($prokerposyandu as $item)
                                    @if ($item->StatusKegiatan == 'Penyuluhan')
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                            <div class="custom-block bg-white shadow-lg">
                                                {{-- <a href="{{ url('/detail', $item->id) }}"> --}}
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">{{ $item->Nama }}</h5>
                                                        <p class="mb-0">{!! html_entity_decode($item->Caption) !!}</p>

                                                    </div>

                                                    {{-- <span class="badge bg-design rounded-pill ms-auto">14</span> --}}
                                                </div>
                                                <img src="{{ url('edukasikegiatan', $item->image) }}"
                                                    class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="marketing1-tab-pane" role="tabpanel" aria-labelledby="marketing-tab"
                            tabindex="0">
                            <div class="row">
                                @foreach ($prokerposyandu as $item)
                                    @if ($item->StatusKegiatan == 'Pembinaan Mental')
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                            <div class="custom-block bg-white shadow-lg">
                                                {{-- <a href="topics-detail.html"> --}}
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">{{ $item->Nama }}</h5>

                                                        <p class="mb-0">{!! html_entity_decode($item->Caption) !!}</p>
                                                    </div>
                                                </div>

                                                <img src="{{ url('edukasikegiatan', $item->image) }}"
                                                    class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="finance1-tab-pane" role="tabpanel" aria-labelledby="finance-tab"
                            tabindex="0">
                            <div class="row">
                                @foreach ($prokerposyandu as $item)
                                    @if ($item->StatusKegiatan == 'Pemeriksaan Kesehatan')
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                            <div class="custom-block bg-white shadow-lg">
                                                {{-- <a href="topics-detail.html"> --}}
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">{{ $item->Nama }}</h5>

                                                        <p class="mb-0">{!! html_entity_decode($item->Caption) !!}</p>
                                                    </div>
                                                </div>

                                                <img src="{{ url('edukasikegiatan', $item->image) }}"
                                                    class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>

                        <div class="tab-pane fade" id="music1-tab-pane" role="tabpanel" aria-labelledby="music-tab"
                            tabindex="0">
                            <div class="row">
                                @foreach ($prokerposyandu as $item)
                                    @if ($item->StatusKegiatan == 'Kunjungan Ke Rumah')
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                            <div class="custom-block bg-white shadow-lg">
                                                {{-- <a href="topics-detail.html"> --}}
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">{{ $item->Nama }}</h5>

                                                        <p class="mb-0">{!! html_entity_decode($item->Caption) !!}</p>
                                                    </div>
                                                </div>

                                                <img src="{{ url('edukasikegiatan', $item->image) }}"
                                                    class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
