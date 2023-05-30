@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">

            {{-- <div class="alert" role="alert" style="background-color:#2e2a4cc9; color:#fff;">
                <p class="mb-0"><b>Selamat Datang
                        {{ ucwords(Auth::user()->name) }} </b></p>
            </div> --}}

            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        @if ($cek < 1)
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang
                                    {{ isset(Auth::user()->siswa->nama_lengkap) ? ucwords(Auth::user()->siswa->nama_lengkap) : ucwords(Auth::user()->name) }}
                                    😊
                                </h5>
                                {{-- <p class="mb-4">{{ $pesan }} <span>Sebelum Melakukan
                                        Pendaftaran, Silahkan Lengkapi Biodata Kamu Terlebih Dahulu!</span> </p> --}}
                                <p class="mb-4" style="color: #ff0000; font-weight: bold;">{{ $pesan }} <span
                                        style="color: #ff0000;">Sebelum Melakukan Pendaftaran, Silahkan Lengkapi Biodata
                                        Kamu Terlebih Dahulu!</span></p>


                                <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary">Lengkapi Biodata</a>
                            </div>
                        @else
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang
                                    {{ isset(Auth::user()->siswa->nama_lengkap) ? ucwords(Auth::user()->siswa->nama_lengkap) : ucwords(Auth::user()->name) }}
                                    😊</h5>
                                <p class="mb-4" style="color: #0000ff;; font-weight: bold;">{{ $pesan }}😁
                                    <br><span style="color: #0000ff;">Silahkan Lanjutkan Pendaftaran</span>
                                </p>

                                <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-primary">View Biodata</a>
                            </div>
                        @endif

                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('sneat/assets/img/illustrations/man-with-laptop-light.png') }}"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>



            {{-- <div class="card">

                <h5 class="card-header"></h5>

                <div class="card-body ">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <center>
                                @if ($cek < 1)
                                    <div class="col-8">
                                        <div class="card-body">
                                            <div class="alert alert-danger d-flex" role="alert">
                                                <span
                                                    class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                                        class="bx bx-store fs-6"></i></span>
                                                <div class="d-flex flex-column ps-1">
                                                    <h2
                                                        class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                                        {{ $pesan }}
                                                    </h2>
                                                    <span style="width:100%">Sebelum Melakukan Pendaftaran, Silahkan
                                                        Lengkapi Biodata!</span>

                                                    <a href="{{ route('siswa.create') }}" class="btn btn-primary mt-2">
                                                        <i class="fa fa-eye"></i> Lengkapi Biodata
                                                    </a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <div class="col-8">
                                        <div class="card-body">
                                            <div class="alert alert-info d-flex" role="alert">
                                                <span
                                                    class="badge badge-center rounded-pill bg-info border-label-info p-3 me-2"><i
                                                        class="bx bx-detail fs-6"></i></span>
                                                <div class="d-flex flex-column ps-1">
                                                    <h2
                                                        class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                                        {{ $pesan }}
                                                    </h2>
                                                    <span style="width:100%">Silahkan Lanjutkan Pendaftaran..</span>

                                                    <a href="{{ route('siswa.index') }}" class="btn btn-info mt-2">
                                                        <i class="fa fa-eye"></i> View Data
                                                    </a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endif
                            </center>

                            <center>
                                @if ($cekLulus?->status == 1)
                                    <div class="col-8">
                                        <div class="card-body">
                                            <div class="alert alert-danger d-flex" role="alert">
                                                <span
                                                    class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                                        class="bx bx-store fs-6"></i></span>
                                                <div class="d-flex flex-column ps-1">
                                                    <h2
                                                        class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                                        Selamat Anda Diterima Di Sekolah {{ $cekLulus->sekolah->nama }}
                                                    </h2>
                                                    <p class="mt-2">Klik Disini Untuk <a
                                                            href="{{ route('kartu_pendaftaran') }}">Cetak Kartu
                                                            Pendaftaran</a></p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @elseif ($cekLulus?->status == 2)
                                    <div class="col-8">
                                        <div class="card-body">
                                            <div class="alert alert-danger d-flex" role="alert">
                                                <span
                                                    class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                                        class="bx bx-detail fs-6"></i></span>
                                                <div class="d-flex flex-column ps-1">
                                                    <h2
                                                        class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                                        Maaf, Anda Belum Lulus
                                                    </h2>
                                                    <span style="width:100%">Silahkan Lanjutkan Pendaftaran..</span>

                                                    <a href="{{ route('siswa.index') }}" class="btn btn-info mt-2">
                                                        <i class="fa fa-eye"></i> View Data
                                                    </a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <div class="col-8">
                                        <div class="card-body">
                                            <div class="alert alert-info d-flex" role="alert">
                                                <span
                                                    class="badge badge-center rounded-pill bg-info border-label-info p-3 me-2"><i
                                                        class="bx bx-detail fs-6"></i></span>
                                                <div class="d-flex flex-column ps-1">
                                                    <h2
                                                        class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                                    </h2>
                                                    <span style="width:100%">Silahkan Lanjutkan Pendaftaran..</span>

                                                    <a href="{{ route('siswa.index') }}" class="btn btn-info mt-2">
                                                        <i class="fa fa-eye"></i> View Data
                                                    </a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
