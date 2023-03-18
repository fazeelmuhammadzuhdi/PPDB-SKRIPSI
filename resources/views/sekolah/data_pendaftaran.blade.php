@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-xl-12">
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home"
                                    aria-selected="true"><i class="bx bx-user"></i> ZONASI</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                                    aria-selected="false" tabindex="-1"><i class="bx bx-user"></i> AFIRMASI </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages"
                                    aria-selected="false" tabindex="-1"><i class="bx bx-user"></i> PINDAH
                                    TUGAS</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-end" aria-controls="navs-pills-top-end"
                                    aria-selected="false" tabindex="-1"><i class="bx bx-user"></i> PRESTASI</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="navs-pills-top-home" role="tabpanel">
                                @include('sekolah.partials.data_pendaftaran_zonasi')
                            </div>
                            <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                                @include('sekolah.partials.data_pendaftaran_afirmasi')
                            </div>
                            <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                                @include('sekolah.partials.data_pendaftaran_pindah_tugas')
                            </div>
                            <div class="tab-pane fade" id="navs-pills-top-end" role="tabpanel">
                                @include('sekolah.partials.data_pendaftaran_prestasi')
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
