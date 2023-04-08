@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <center>
                    @if ($cekLulusPrestasi?->status == 1 || $cekLulusAfirmasi?->status == 1 || $cekLulusPindahTugas?->status == 1)
                        <div class="col-8">
                            <div class="card-body">
                                <div class="alert alert-danger d-flex" role="alert">
                                    <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                            class="bx bx-store fs-6"></i></span>
                                    <div class="d-flex flex-column ps-1">
                                        <h2
                                            class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                            @if ($cekLulusPrestasi?->status == 1)
                                                Selamat Anda Diterima Di Sekolah {{ $cekLulusPrestasi->sekolah->nama }}
                                            @elseif ($cekLulusAfirmasi?->status == 1)
                                                Selamat Anda Diterima Di Sekolah {{ $cekLulusAfirmasi->sekolah->nama }}
                                            @elseif ($cekLulusPindahTugas?->status == 1)
                                                Selamat Anda Diterima Di Sekolah {{ $cekLulusPindahTugas->sekolah->nama }}
                                            @endif
                                        </h2>
                                        <p class="mt-2">Klik Disini Untuk <a href="{{ route('kartu_pendaftaran') }}">Cetak
                                                Kartu
                                                Pendaftaran</a></p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @else
                        <div class="col-8">
                            <div class="card-body">
                                <div class="alert alert-danger d-flex" role="alert">
                                    <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                            class="bx bx-detail fs-6"></i></span>
                                    <div class="d-flex flex-column ps-1">
                                        <h2
                                            class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                            Maaf, Anda Belum Lulus
                                        </h2>
                                        <span style="width:100%">Silahkan Lanjutkan Pendaftaran..</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endif
                </center>
            </div>
        </div>
    </div>


@endsection
