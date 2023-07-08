@extends('layouts.main')

@section('content')
    <style>
        .badge {
            background-color: green
        }

        .badge-red {
            background-color: red
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Form Laporan</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Filter Laporan</h4>
                            @include('laporan.all_laporan')
                        </div>
                    </div>
                    <hr style="border: 1px solid rgb(189, 16, 16);">

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h4>Data Pendaftaran Calon Peserta Didik Per Tahun</h4>
                            @include('laporan.pertahun')
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
