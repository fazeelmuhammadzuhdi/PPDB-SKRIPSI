@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }} {{ $dataZonasi->siswa->nama_lengkap }}</h5>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST"
                        action="{{ route('data_pendaftaran_zonasi.update', $dataZonasi->id) }}">
                        @csrf
                        @method('PUT')
                        <table class="table table-sm mt-2">
                            <tr>
                                <td rowspan="13" width="100">
                                    <img src="{{ Storage::url($dataZonasi->siswa->foto ?? '') }}"
                                        alt="{{ $dataZonasi->siswa->nama_lengkap }}" width="100">
                                </td>
                            </tr>

                            <tr>
                                <td width="25%">Status Siswa</td>
                                <td>:
                                    <span>
                                        @if ($dataZonasi->status == 1)
                                            <span class="badge bg-success">Lulus</span>
                                        @elseif ($dataZonasi->status == 2)
                                            <span class="badge bg-danger">Belum Lulus</span>
                                        @else
                                            <span class="badge bg-warning">Dalam Seleksi</span>
                                        @endif
                                    </span>
                                </td>

                            </tr>

                            <tr>
                                <td>Nomor Pendaftaran</td>
                                <td>: <span class="badge bg-success rounded">
                                        {{ $dataZonasi->siswa->no_pendaftaran }}
                                    </span></td>
                            </tr>
                            <tr>
                                <td>Nama Siswa</td>
                                <td style="text-transform: uppercase">: {{ $dataZonasi->siswa->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>: {{ $dataZonasi->siswa->nisn }}</td>
                            </tr>
                            <tr>
                                <td>Asal Sekolah</td>
                                <td>: {{ $dataZonasi->siswa->sekolah_asal }}</td>
                            </tr>
                            <tr>
                                <td>Sekolah Pedaftaran</td>
                                <td>: {{ $dataZonasi->sekolah->nama }}</td>
                            </tr>
                            <tr>
                                <td>Tempat / Tanggal Lahir</td>
                                <td>: {{ $dataZonasi->siswa->tempat_tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>: {{ $dataZonasi->siswa->agama }}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>: {{ $dataZonasi->siswa->kecamatan->nama_kecamatan }}</td>
                            </tr>
                            <tr>
                                <td>Nagari</td>
                                <td>: {{ $dataZonasi->siswa->nagari->nama_nagari }}</td>
                            </tr>
                            <tr>
                                <td>Kampung</td>
                                <td>: {{ $dataZonasi->siswa->kampung->nama_kampung }}</td>
                            </tr>
                        </table>

                        <h5 class="mt-3"><b>DETAIL SEKOLAH</b></h5>
                        <table class="table table-sm mt-3">

                            <tr>
                                <td width=38%>Nama Sekolah</td>
                                <td style="text-transform: uppercase">: {{ $dataZonasi->sekolah->nama }}</td>
                            </tr>
                            <tr>
                                <td>NPSN Sekolah</td>
                                <td>: {{ $dataZonasi->sekolah->npsn }}</td>
                            </tr>
                            <tr>
                                <td>Alamat Sekolah</td>
                                <td>: {!! $dataZonasi->sekolah->alamat !!}</td>
                            </tr>
                            @foreach ($dataZonasiSekolah as $item)
                                <tr>
                                    <td>Kecamatan Sekolah</td>
                                    <td>: {{ $item->kecamatan->nama_kecamatan }}</td>
                                </tr>
                                <tr>
                                    <td>Nagari Sekolah</td>
                                    <td>: {{ $item->nagari->nama_nagari }}</td>
                                </tr>
                                <tr>
                                    <td>Kampung Sekolah</td>
                                    <td>: {{ $item->kampung->nama_kampung }}</td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="mt-3">
                            <a href="{{ route('data_pendaftaran_prestasi.index') }}" class="btn btn-primary">
                                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>

                            @if ($dataZonasi->status == null)
                                <button type="submit" class="btn btn-dark mx-1">
                                    Diterima ✅
                                </button>

                                <a href="{{ route('updateStatusDitolak', $dataZonasi->id) }}" class="btn btn-dark">
                                    Ditolak ❌
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
