@extends('layouts.main')

@section('content')
    @if ($tanggalSekarang < $tanggalAkhirKelulusan)
        {{-- @if ($tanggalSekarang <= $tanggalAkhirKelulusan) --}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="container-fluid pt-5">
                        <div class="text-center p-5">
                            <img src="{{ asset('images/not_found.png') }}" alt="" width="250">
                            {{-- <i class="fa fa-sticky-note text-primary" aria-hidden="true" style="font-size: 64px"></i> --}}
                            <h4 class="my-3">Belum Waktunya Cek Kelulusan</h4>
                            <p>Informasi Kelulusan Tanggal
                                {{ \Carbon\Carbon::parse($tanggalAkhirKelulusan)->format('d F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <center>
            @if (
                $cekLulusJalurPrestasi?->status == 1 ||
                    $cekLulusJalurAfirmasi?->status == 1 ||
                    $cekLulusJalurPindahTugas?->status == 1 ||
                    $cekLulusJalurZonasi?->status == 1)
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="alert alert-danger d-flex" role="alert">
                            <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                    class="bx bx-store fs-6"></i></span>
                            <div class="d-flex flex-column ps-1">
                                <h2 class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                    @if ($cekLulusJalurPrestasi?->status == 1)
                                        Selamat Anda Diterima Di Sekolah {{ $cekLulusJalurPrestasi->sekolah->nama }}
                                    @elseif ($cekLulusJalurAfirmasi?->status == 1)
                                        Selamat Anda Diterima Di Sekolah {{ $cekLulusJalurAfirmasi->sekolah->nama }}
                                    @elseif ($cekLulusJalurZonasi?->status == 1)
                                        Selamat Anda Diterima Di Sekolah {{ $cekLulusJalurZonasi->sekolah->nama }}
                                    @elseif ($cekLulusJalurPindahTugas?->status == 1)
                                        Selamat Anda Diterima Di Sekolah {{ $cekLulusJalurPindahTugas->sekolah->nama }}
                                    @endif
                                </h2>
                                <p class="mt-2"><a href="{{ route('cek_hasil_kelulusan') }}" target="_blank">Klik Disini Untuk Cetak Bukti
                                        Hasil Kelulusan</a></p>
                            </div>

                        </div>

                    </div>
                </div>
            @elseif (
                $cekLulusJalurPrestasi?->status == 2 ||
                    $cekLulusJalurAfirmasi?->status == 2 ||
                    $cekLulusJalurPindahTugas?->status == 2 ||
                    $cekLulusJalurZonasi?->status == 2)
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="alert alert-danger d-flex" role="alert">
                            <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                    class="bx bx-store fs-6"></i></span>
                            <div class="d-flex flex-column ps-1">
                                <h2 class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                    @if ($cekLulusJalurPrestasi?->status == 2)
                                        Maaf, Anda Tidak Lulus Di Sekolah {{ $cekLulusJalurPrestasi->sekolah->nama }}
                                    @elseif ($cekLulusJalurAfirmasi?->status == 2)
                                        Maaf, Anda Tidak Lulus Di Sekolah {{ $cekLulusJalurAfirmasi->sekolah->nama }}
                                    @elseif ($cekLulusJalurZonasi?->status == 2)
                                        Maaf, Anda Tidak Lulus Di Sekolah {{ $cekLulusJalurZonasi->sekolah->nama }}
                                    @elseif ($cekLulusJalurPindahTugas?->status == 2)
                                        Maaf, Anda Tidak Lulus Di Sekolah {{ $cekLulusJalurPindahTugas->sekolah->nama }}
                                    @endif
                                </h2>
                                <p class="mt-2"><a href="{{ route('cek_hasil_kelulusan') }}">Klik Disini Untuk Cetak Bukti
                                        Hasil Kelulusan</a></p>
                            </div>

                        </div>

                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="alert alert-danger d-flex" role="alert">
                            <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                    class="bx bx-detail fs-6"></i></span>
                            <div class="d-flex flex-column ps-1">
                                <h2 class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                    Sedang Dalam Proses Seleksi
                                </h2>
                            </div>

                        </div>

                    </div>
                </div>
            @endif
        </center>
    @endif
@endsection
