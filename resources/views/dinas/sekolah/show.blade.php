@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">{{ $title }}</h2> <small class="text-muted float-end">
                        <a href="{{ route('sekolah.index') }}" class="btn btn-primary"> <i class="fa fa-backward"></i>
                            Kembali</a></small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm table-bordered">
                            <thead>
                                <tr>
                                    <td width="20%">Nama Sekolah</td>
                                    <td width="1%">:</td>
                                    <td>{{ $sekolah->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Operator</td>
                                    <td>:</td>
                                    <td>{{ ucwords($sekolah->adminSekolah->name) }}</td>
                                </tr>
                                <tr>
                                    <td>NPSN Sekolah</td>
                                    <td>:</td>
                                    <td>{{ $sekolah->npsn }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Sekolah</td>
                                    <td>:</td>
                                    <td>{!! $sekolah->alamat !!}</td>
                                </tr>
                                <tr>
                                    <td>Akreditasi Sekolah</td>
                                    <td>:</td>
                                    <td>{{ $sekolah->akreditasi }}</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan Sekolah</td>
                                    <td>:</td>
                                    <td>{{ $sekolah->kecamatan }}</td>
                                </tr>
                                <tr>
                                    <td>No Telp Sekolah</td>
                                    <td>:</td>
                                    <td>{{ $sekolah->notelp }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
