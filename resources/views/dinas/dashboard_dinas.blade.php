@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">
                    <div class="alert alert-primary" role="alert">
                        <center>
                            <strong>Selamat Datang {{ ucwords(Auth::user()->name) }} Sebagai {{ Auth::user()->akses }}
                                {{-- {{ $sekolah->nama }} --}} {{ Auth::user()->sekolah->nama ?? '' }}</strong>
                        </center>
                    </div>
                </h5>
            </div>
        </div>
    </div>
@endsection
