@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Selamat Datang {{ ucwords(Auth::user()->name) }}</h5>

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
                                @if ($cek_lulus == 1)
                                    <div class="col-8">
                                        <div class="card-body">
                                            <div class="alert alert-danger d-flex" role="alert">
                                                <span
                                                    class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                                        class="bx bx-store fs-6"></i></span>
                                                <div class="d-flex flex-column ps-1">
                                                    <h2
                                                        class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                                        {{ $pesanLulus }}
                                                    </h2>
                                                    {{-- <span style="width:100%">Sebelum Melakukan Pendaftaran, Silahkan
                                                        Lengkapi Biodata!</span> --}}

                                                    {{-- <a href="{{ route('siswa.create') }}" class="btn btn-primary mt-2">
                                                        <i class="fa fa-eye"></i> Lengkapi Biodata
                                                    </a> --}}
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @elseif ($cek_lulus == 2)
                                    <div class="col-8">
                                        <div class="card-body">
                                            <div class="alert alert-info d-flex" role="alert">
                                                <span
                                                    class="badge badge-center rounded-pill bg-info border-label-info p-3 me-2"><i
                                                        class="bx bx-detail fs-6"></i></span>
                                                <div class="d-flex flex-column ps-1">
                                                    <h2
                                                        class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                                        {{ $pesanLulus }}
                                                    </h2>
                                                    {{-- <span style="width:100%">Silahkan Lanjutkan Pendaftaran..</span>

                                                    <a href="{{ route('siswa.index') }}" class="btn btn-info mt-2">
                                                        <i class="fa fa-eye"></i> View Data
                                                    </a> --}}
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
                                                        {{ $pesanLulus }}
                                                    </h2>
                                                    {{-- <span style="width:100%">Silahkan Lanjutkan Pendaftaran..</span>

                                                    <a href="{{ route('siswa.index') }}" class="btn btn-info mt-2">
                                                        <i class="fa fa-eye"></i> View Data
                                                    </a> --}}
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
