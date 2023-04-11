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

                                    {{-- {{ $cekLulusPrestasi }} --}}
                                    @foreach ($cek_siswa->prestasis as $item)
                                        @if ($item->status == 1)
                                            <tr>
                                                <th colspan="27">
                                                    <img src="{{ asset('images/cop.png') }}" width="100%" alt="">
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h2 align="center"><b style="color:rgb(0, 0, 0);">Saudara :
                                                            {{ $item->siswa->nama_lengkap }} telah terdaftar sebagai calon
                                                            Siswa</b></h2>
                                                    <h3 style="color:rgb(0, 0, 0);" align="center">
                                                        </b>{{ $item->sekolah->nama }}</b></h3>
                                                    <p>Cetak Bukti Pendaftaran Ini sebagai syarat untuk daftar ulang
                                                        <br>
                                                    <ol>
                                                        <li> Silahkan Melengkapi Syarat-Syarat Berikut :</li>
                                                        <ul>
                                                            <li>(a). Fotocopy Nilai Rapor Terakhir atau Surat
                                                                Keterangan Lulus (SKL)
                                                            </li>
                                                            <li>(b). Pas Foto 3X4 3 Lembar</li>
                                                            <li>(c). Foto Copy Akta Kelahiran Berwarna dan Kartu
                                                                Keluarga (KK)
                                                            </li>
                                                        </ul>
                                                        <li>Menunjukkan Bukti Pendaftaran yang telah dicetak</li>
                                                        <li> Semua Persyaratan diatas diserahkan paling lambat
                                                            Hari/Tanggal : Rabu / 5 Agustus 2020</li>
                                                    </ol>

                                                    <i style="color:orange">Alamat Sekolah :
                                                        {{ $item->sekolah->alamat }},
                                                        Telp. {{ $item->sekolah->notelp }},
                                                    </i>
                                                    <br>Informasi : Waktu pengantaran berkas persyaratan tunggu
                                                    informasi resmi pada Website atau Media Sosial
                                                    Resmi dari Dinas Pendidikan Dan Kebudayaan Pesisir Selatan
                                                    </p>

                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h2 align="center"> Hasil Penerimaan Peserta Didik Baru <br>
                                                        {{ $item->sekolah->nama }},</h2>
                                                    <h5 style="margin: 6%; text-align: justify"> Berdasarkan Seleksi yang
                                                        saudara lakukan
                                                        pada tanggal {{ $item->siswa->created_at }} WIB. Kami panitia
                                                        Penerimaan
                                                        Peserta Didik Baru Tahun Pelajaran {{ now()->format('Y') }}
                                                        Saudara yang bertanda tangan dibawah ini:<br><br>
                                                        <table width="70%" class="table table-bordered">
                                                            <tr>
                                                                <td>Nama Lengkap</td>
                                                                <td>{{ $item->siswa->nama_lengkap }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>NISN</td>
                                                                <td>{{ $item->siswa->nisn }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sekolah Asal</td>
                                                                <td>{{ $item->siswa->sekolah_asal }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jalur Pendaftaran</td>
                                                                <td>Prestasi</td>
                                                            </tr>
                                                        </table>

                                                        <p class="mb-3">
                                                            Maka dengan ini bagi nama yang telah tercantum diatas, kami
                                                            menyatakan bahwa saudara <span
                                                                style="color: rgb(0, 107, 0)">LULUS</span>
                                                        </p>
                                                    </h5>
                                                @elseif ($item->status == 2)
                                            <tr>
                                                <th colspan="27">
                                                    <img src="{{ asset('images/cop.png') }}" width="100%" alt="">
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h2 align="center"><b style="color:rgb(0, 0, 0);">Saudara :
                                                            {{ $item->siswa->nama_lengkap }} telah terdaftar sebagai calon
                                                            Siswa</b></h2>
                                                    <h3 style="color:rgb(0, 0, 0);" align="center">
                                                        </b>{{ $item->sekolah->nama }}</b></h3>
                                                    <p>Cetak Bukti Pendaftaran Ini sebagai syarat untuk daftar ulang
                                                        <br>
                                                    <ol>
                                                        <li> Silahkan Melengkapi Syarat-Syarat Berikut :</li>
                                                        <ul>
                                                            <li>(a). Fotocopy Nilai Rapor Terakhir atau Surat
                                                                Keterangan Lulus (SKL)
                                                            </li>
                                                            <li>(b). Pas Foto 3X4 3 Lembar</li>
                                                            <li>(c). Foto Copy Akta Kelahiran Berwarna dan Kartu
                                                                Keluarga (KK)
                                                            </li>
                                                        </ul>
                                                        <li>Menunjukkan Bukti Pendaftaran yang telah dicetak</li>
                                                        <li> Semua Persyaratan diatas diserahkan paling lambat
                                                            Hari/Tanggal : Rabu / 5 Agustus 2020</li>
                                                    </ol>

                                                    <i style="color:orange">Alamat Sekolah :
                                                        {{ $item->sekolah->alamat }},
                                                        Telp. {{ $item->sekolah->notelp }},
                                                    </i>
                                                    <br>Informasi : Waktu pengantaran berkas persyaratan tunggu
                                                    informasi resmi pada Website atau Media Sosial
                                                    Resmi dari Dinas Pendidikan Dan Kebudayaan Pesisir Selatan
                                                    </p>

                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h2 align="center"> Hasil Penerimaan Peserta Didik Baru <br>
                                                        {{ $item->sekolah->nama }},</h2>
                                                    <h5 style="margin: 6%; text-align: justify"> Berdasarkan Seleksi yang
                                                        saudara lakukan
                                                        pada tanggal {{ $item->siswa->created_at }} WIB. Kami panitia
                                                        Penerimaan
                                                        Peserta Didik Baru Tahun Pelajaran {{ now()->format('Y') }}
                                                        Saudara yang bertanda tangan dibawah ini:<br><br>
                                                        <table width="70%" class="table table-bordered">
                                                            <tr>
                                                                <td>Nama Lengkap</td>
                                                                <td>{{ $item->siswa->nama_lengkap }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>NISN</td>
                                                                <td>{{ $item->siswa->nisn }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sekolah Asal</td>
                                                                <td>{{ $item->siswa->sekolah_asal }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jalur Pendaftaran</td>
                                                                <td>Prestasi</td>
                                                            </tr>
                                                        </table>

                                                        <div class="mt-3">
                                                            <p>
                                                                Mohon maaf dengan ini bagi nama yang telah tercantum
                                                                diatas,kami
                                                                menyatakan bahwa saudara<span style="color: red"> BELUM
                                                                    LULUS</span> Tetap Semangat 😁
                                                            </p>
                                                        </div>
                                                    </h5>
                                                @else
                                                    HALOOO
                                        @endif
                                    @endforeach
                                    {{-- <form action="/hasil/cetak_pdf" method="GET">
                                            <div class="form-group-inner input-with-success">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin:6%">
                                                        <div class="form-select-list">
                                                            <label for="cari">Kode Pendaftaran</label>
                                                            <input type="text" name="cari" required
                                                                class="form-control" placeholder="Cek Hasil .."
                                                                value="{{ $p['kode'] }}">
                                                            <br>
                                                            <input type="submit" class="btn btn-primary fa fa-file-pdf-o"
                                                                value="cetak">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form> --}}

                                    </th>
                                    </tr>
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
