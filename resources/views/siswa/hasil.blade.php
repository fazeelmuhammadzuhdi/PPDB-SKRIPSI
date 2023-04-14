@extends('layouts.blank')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white p-5 r-5">
                            <div class="card-title">

                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover "
                                    data-options='{
                                        "scrollY": true,
                                        "scrollX": true
                                    }'>

                                    @include('siswa.hasil_pengumuman_prestasi')
                                    @include('siswa.hasil_pengumuman_afirmasi')
                                    @include('siswa.hasil_pengumuman_pindah_tugas')


                                    {{-- <form action="{{ route('kartu_pendaftaran') }}" method="GET">
                                        @csrf
                                        <div class="form-group-inner input-with-success">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin:6%">
                                                    <div class="form-select-list">
                                                        <input type="hidden" name="cari" class="form-control"
                                                            placeholder="Cek Hasil .."
                                                            value="{{ $cek_siswa->no_pendaftaran }}">
                                                        <br>
                                                        <input type="submit" class="btn btn-primary fa fa-file-pdf-o"
                                                            value="cetak">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form> --}}

                                </table>
                            </div>
                        </div>
                    </div>
                </div>





                {{-- <center>
                    @if ($cekLulusPrestasi?->status == 1 || $cekLulusAfirmasi?->status == 1 || $cekLulusPindahTugas?->status == 1)
                        <div class="col-8">
                            <div class="card-body">
                                <div class="alert alert-danger d-flex" role="alert">
                                    <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                            class="bx bx-store fs-6"></i></span>
                                    <div class="d-flex flex-column ps-1">
                                        <h2
                                            class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                            @if ($cekLulusPrestasi?->status == 1)
                                                Selamat Anda Diterima Di Sekolah {{ $cekLulusPrestasi->sekolah->nama }}
                                            @elseif ($cekLulusAfirmasi?->status == 1)
                                                Selamat Anda Diterima Di Sekolah {{ $cekLulusAfirmasi->sekolah->nama }}
                                            @elseif ($cekLulusPindahTugas?->status == 1)
                                                Selamat Anda Diterima Di Sekolah {{ $cekLulusPindahTugas->sekolah->nama }}
                                            @endif
                                        </h2>
                                        <p class="mt-2">Klik Disini Untuk <a href="{{ route('kartu_pendaftaran') }}">Cetak
                                                Kartu
                                                Pendaftaran</a></p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @elseif ($cekLulusPrestasi?->status == 2 || $cekLulusAfirmasi?->status == 2 || $cekLulusPindahTugas?->status == 2)
                        <div class="col-8">
                            <div class="card-body">
                                <div class="alert alert-danger d-flex" role="alert">
                                    <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                            class="bx bx-detail fs-6"></i></span>
                                    <div class="d-flex flex-column ps-1">
                                        <h2
                                            class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                            Maaf, Anda Belum Lulus
                                        </h2>
                                        <span style="width:100%">Silahkan Lanjutkan Pendaftaran..</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @else
                        <div class="col-8">
                            <div class="card-body">
                                <div class="alert alert-danger d-flex" role="alert">
                                    <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                            class="bx bx-detail fs-6"></i></span>
                                    <div class="d-flex flex-column ps-1">
                                        <h2
                                            class="alert-heading d-flex justify-content-center align-items-center fw-bold mb-1">
                                            Sedang Dalam Proses Seleksi
                                        </h2>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endif
                </center> --}}
            </div>
        </div>
    </div>
@endsection

<script>
    window.print()
</script>
