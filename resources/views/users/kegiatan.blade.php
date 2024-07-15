<section class="explore-section section-padding" id="section_5">
    <div class="container">
        <div class="col-12 text-center">
            <h2 class="mb-4">Informasi Kegiatan</h1>
        </div>

    </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            {<ul class="nav nav-tabs" id="myTab" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="marketing-tab" data-bs-toggle="tab"
                        data-bs-target="#marketing-tab-pane" type="button" role="tab"
                        aria-controls="marketing-tab-pane" aria-selected="false">Penyuluhan</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance-tab-pane"
                        type="button" role="tab" aria-controls="finance-tab-pane" aria-selected="false">Pembinaan
                        Mental</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance-tab-pane"
                        type="button" role="tab" aria-controls="finance-tab-pane" aria-selected="false">Pemeriksaan
                        Kesehatan
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance-tab-pane"
                        type="button" role="tab" aria-controls="finance-tab-pane" aria-selected="false">Kunjungan
                        Ke
                        Rumah
                </li>
            </ul>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel"
                        aria-labelledby="design-tab" tabindex="0">
                        <div class="row">
                            @foreach ($prokerposyandu as $item)
                                @if ($item->StatusLanding == 'Penyuluhan')
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

                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel"
                                aria-labelledby="design-tab" tabindex="0">
                                <div class="row">
                                    @foreach ($prokerposyandu as $item)
                                        @if ($item->StatusLanding == 'Pembinaan Mental')
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

                            <div class="col-12">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel"
                                        aria-labelledby="design-tab" tabindex="0">
                                        <div class="row">
                                            @foreach ($prokerposyandu as $item)
                                                @if ($item->StatusLanding == 'Pemeriksaan Kesehatan')
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

                                    <div class="tab-pane fade" id="marketing-tab-pane" role="tabpanel"
                                        aria-labelledby="marketing-tab" tabindex="0">
                                        <div class="row">
                                            @foreach ($prokerposyandu as $item)
                                                @if ($item->StatusLanding == 'Kunjungan Ke Rumah')
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
</section>
