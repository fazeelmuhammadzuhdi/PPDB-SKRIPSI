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
                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="card-title mb-1 text-nowrap">{{ $pesan }}</h4>
                                                <small class="d-block pb-1 text-muted fw-bold">Silahkan Lengkapi Data - Data
                                                    Anda Terlebih Dahulu</small>
                                                <a href="{{ route('siswa.create') }}"
                                                    class="btn btn-sm btn-primary mt-3">Lengkapi
                                                    Data</a>
                                            </div>


                                        </div>
                                    </div>
                                @else
                                    <div class="col-8">
                                        <div class="card-body">
                                            <div class="alert alert-success" role="alert">
                                                <h4 class="card-title mb-1 text-nowrap">{{ $pesan }}</h4>

                                                <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-primary mt-3">
                                                    <i class="fa fa-eye"></i> View Data
                                                </a>
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
