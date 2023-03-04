@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Selamat Datang {{ ucwords(Auth::user()->name) }}</h5>

                <div class="card-body">
                    Silahkan Lengkapi Biodata Anda <a href="{{ route('siswa.create') }}">Klik Disini</a>
                </div>
            </div>
        </div>
    </div>
@endsection
