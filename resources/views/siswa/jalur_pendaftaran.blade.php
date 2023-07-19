@extends('layouts.main')

@section('content')
    @if ($cek > 0 && $cek_prestasi != 1 && $cek_afirmasi != 1 && $cek_pindah_tugas != 1 && $cek_zonasi != 1)
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Jalur Pendaftaran</p>
                        <h5 class="text-white fw-bold">ZONASI</h5>
                    </div>
                    <div class="icon">
                        <i class="bx bx-right-arrow-circle"></i>
                    </div>
                    <a href="{{ route('zonasi.create') }}" class="small-box-footer">Klik Disini &nbsp;
                        <i class="bx bx-right-arrow-circle  "></i></a>
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
                        <i class="bx bx-right-arrow-circle"></i>
                    </div>
                    <a href="{{ route('pindahtugas.create') }}" class="small-box-footer">Klik Disini &nbsp;
                        <i class="bx bx-right-arrow-circle  "></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Jalur Pendaftaran</p>
                        <h5 class="text-white fw-bold">AFIRMASI</h5>
                    </div>
                    <div class="icon">
                        <i class="bx bx-right-arrow-circle"></i>
                    </div>
                    <a href="{{ route('afirmasi.create') }}" class="small-box-footer">Klik Disini &nbsp;
                        <i class="bx bx-right-arrow-circle  "></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>Jalur Pendaftaran</p>
                        <h5 class="text-white fw-bold">PRESTASI</h5>
                    </div>
                    <div class="icon">
                        <i class="bx bx-right-arrow-circle"></i>
                    </div>
                    <a href="{{ route('prestasi.create') }}" class="small-box-footer">Klik Disini &nbsp;
                        <i class="bx bx-right-arrow-circle  "></i></a>
                </div>
            </div>
        </div>
    @endif
    @if ($cek == 0)
        <div class="alert alert-danger alert-dismissible" role="alert" style="background-color: red; color: #FFF;">
            <h6 class="alert-heading d-flex align-items-center fw-bold mb-2">Info!!</h6>
            <p class="mb-0">BIODATA ANDA BELUM LENGKAP. SILAHKAN LENGKAPI BIODATA TERLEBIH DAHULU SEBELUM MELAKUKAN
                PENDAFTARAN</p>
            <span><a href="{{ route('siswa.create') }}" style="color: #FFF">Klik Disini Untuk Melengkapi Biodata</a></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif


    
    @if ($cek_prestasi == 1 || $cek_afirmasi == 1 || $cek_pindah_tugas == 1 || $cek_zonasi == 1)
        <div class="card">
            <div class="card-body">
                <div class="panel-body">
                    <div class="alert" role="alert" style="background-color:#576574; color:#fff;">
                        Kamu sudah Terdaftar PPDB {{ date('Y') }} Kabupaten Pesisir Selatan
                    </div>
                    <center>
                        <div class="card-body" id="cetak">
                            <h4 style="text-align: center">KARTU PENDAFTARAN PPDB {{ date('Y') }}</h4>
                            <hr>
                            <table width="80%" class="table table-bordered">
                                <tbody>
                                    @if ($cek_prestasi)
                                        <tr>
                                            <td width="30%"><b>Jalur Pendaftaran</b></td>
                                            <td width="50%">PRESTASI</td>
                                            <td width="20%" rowspan="10">
                                                <img src="{{ Storage::url($cek_siswa->foto) }}" width="100%">
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($cek_afirmasi)
                                        <tr>
                                            <td width="30%"><b>Jalur Pendaftaran</b></td>
                                            <td width="50%">AFIRMASI</td>
                                            <td width="20%" rowspan="10">
                                                <img src="{{ Storage::url($cek_siswa->foto) }}" width="100%">
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($cek_pindah_tugas)
                                        <tr>
                                            <td width="30%"><b>Jalur Pendaftaran</b></td>
                                            <td width="50%">PINDAH TUGAS ORANG TUA</td>
                                            <td width="20%" rowspan="10">
                                                <img src="{{ Storage::url($cek_siswa->foto) }}" width="100%">
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($cek_zonasi)
                                        <tr>
                                            <td width="30%"><b>Jalur Pendaftaran</b></td>
                                            <td width="50%">ZONASI</td>
                                            <td width="20%" rowspan="10">
                                                <img src="{{ Storage::url($cek_siswa->foto) }}" width="100%">
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td><b>NO PENDAFTARAN</b></td>
                                        <td><span
                                                class="badge rounded-pill bg-info fw-bold">{{ $cek_siswa->no_pendaftaran }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        @if ($cek_prestasi)
                                            <td><b>Sekolah Pendaftaran</b></td>
                                            <td>{{ $cekLulusJalurPrestasi->sekolah->nama }}</td>
                                        @endif
                                        @if ($cek_afirmasi)
                                            <td><b>Sekolah Pendaftaran</b></td>
                                            <td>{{ $cekLulusJalurAfirmasi->sekolah->nama }}</td>
                                        @endif
                                        @if ($cek_pindah_tugas)
                                            <td><b>Sekolah Pendaftaran</b></td>
                                            <td>{{ $cekLulusJalurPindahTugas->sekolah->nama }}</td>
                                        @endif
                                        @if ($cek_zonasi)
                                            <td><b>Sekolah Pendaftaran</b></td>
                                            <td>{{ $cekLulusJalurZonasi->sekolah->nama }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        @if ($cek_prestasi)
                                            <td><b>Tanggal Pendaftaran</b></td>
                                            <td>
                                                {{ $cekLulusJalurPrestasi->formattedDateTime }}
                                            </td>
                                        @endif
                                        @if ($cek_afirmasi)
                                            <td><b>Tanggal Pendaftaran</b></td>
                                            <td>
                                                {{ $cekLulusJalurAfirmasi->formattedDateTime }}
                                            </td>
                                        @endif
                                        @if ($cek_pindah_tugas)
                                            <td><b>Tanggal Pendaftaran</b></td>
                                            <td>
                                                {{ $cekLulusJalurPindahTugas->formattedDateTime }}
                                            </td>
                                        @endif
                                        @if ($cek_zonasi)
                                            <td><b>Tanggal Pendaftaran</b></td>
                                            <td>
                                                {{ $cekLulusJalurZonasi->formattedDateTime }}
                                            </td>
                                        @endif
                                    </tr>

                                    <tr>
                                        <td><b>NISN</b></td>
                                        <td>{{ $cek_siswa->nisn }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>NIK</b></td>
                                        <td>{{ $cek_siswa->no_nik }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Lengkap</b></td>
                                        <td>{{ $cek_siswa->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Asal Sekolah</b></td>
                                        <td>{{ $cek_siswa->sekolah_asal }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Jenis Kelamin</b></td>
                                        <td>{{ $cek_siswa->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Tempat / Tanggal Lahir</b></td>
                                        <td>{{ $cek_siswa->getTempatTanggalLahirAttribute() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            Keterangan : Kartu Pendaftaran ini adalah bukti pendaftaran yang sah PPDB {{ date('Y') }}.
                            <button class="btn btn-primary btn-sm" onclick="printDiv('cetak')"><i class="fa fa-print"> </i>
                                Cetak</button>
                        </div>
                    </center>
                </div>
            </div>
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


        .small-box .icon>i.bx {
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
