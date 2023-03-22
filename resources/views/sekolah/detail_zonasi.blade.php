@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0" style="color:#8e44ad">Data Zonasi {{ $data_prestasi->siswa->nama_lengkap }}</h4>
                    <small class="text-muted float-end">

                </div>

                <div class="card-footer">
                    <a href="{{ route('data_pendaftaran_prestasi.index') }}" class="btn btn-primary">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
                </div>




            </div>

        </div>
    </div>
@endsection
