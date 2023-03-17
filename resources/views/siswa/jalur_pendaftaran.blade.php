@extends('layouts.main')

@section('content')
    @if ($cek > 0)
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Jalur Pendaftaran</p>
                        <h5 class="text-white fw-bold">ZONASI</h5>
                    </div>
                    <div class="icon">
                        <i class="fas fa-arrow-circle-right"></i>
                    </div>
                    <a href="{{ route('dashboard_siswa') }}" class="small-box-footer">Klik Disini &nbsp;
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <p>Jalur Pendaftaran</p>
                        <h5 class="text-white fw-bold">Pindah Tugas
                        </h5>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="{{ route('dashboard_siswa') }}" class="small-box-footer">Klik Disini &nbsp;
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Jalur Pendaftaran</p>
                        <h5 class="text-white fw-bold">AFIRMASI</h5>
                    </div>
                    <div class="icon">
                        <i class="fas fa-brands fa-github"></i>
                    </div>
                    <a href="{{ route('dashboard_siswa') }}" class="small-box-footer">Klik Disini &nbsp;
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>Jalur Pendaftaran</p>
                        <h5 class="text-white fw-bold">PRESTASI</h5>
                    </div>
                    <div class="icon">
                        {{-- <i class="fas fa-arrow-circle-right"></i> --}}
                        <i class="fas fa-duotone fa-circle-exclamation"></i>
                    </div>
                    <a href="{{ route('prestasi.index') }}" class="small-box-footer">Klik Disini &nbsp;
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    @else
        <div class="alert alert-danger alert-dismissible" role="alert">
            <h6 class="alert-heading d-flex align-items-center fw-bold mb-2">Info!!</h6>
            <p class="mb-0">BIODATA ANDA BELUM LENGKAP. SILAHKAN LENGKAPI BIODATA TERLEBIH DAHULU SEBELUM MELAKUKAN
                PENDAFTARAN</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
@endsection

@push('after-style')
    <style>
        .small-box {
            border-radius: 0.25rem;
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            display: block;
            position: relative;
            color: #ffffff !important;
        }

        .small-box>.inner {
            padding: 10px;
        }

        .small-box .icon {
            color: rgba(0, 0, 0, .15);

        }


        .small-box .icon>i.fas {
            font-size: 70px;
            top: 20px;
        }

        .small-box .icon>i {
            font-size: 90px;
            position: absolute;
            right: 15px;
            top: 15px;
        }

        .small-box>.small-box-footer {
            background-color: rgba(0, 0, 0, .1);
            color: rgba(255, 255, 255, .8);
            display: block;
            padding: 3px 0;
            position: relative;
            text-align: center;
            text-decoration: none;
            z-index: 10;
        }
    </style>
@endpush
