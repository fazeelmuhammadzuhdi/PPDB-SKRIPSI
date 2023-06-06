@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0" style="color:#8e44ad">Data Afirmasi {{ $data_afirmasi->siswa->nama_lengkap }}
                        ({{ $data_afirmasi->siswa->nisn }})</h4>
                    <small class="text-muted float-end">
                </div>

                <div class="card-body">
                    <table class="table table-sm mt-2">
                        <tr>
                            <td rowspan="9" width="100">
                                <img src="{{ Storage::url($data_afirmasi->siswa->foto ?? '') }}"
                                    alt="{{ $data_afirmasi->siswa->nama_lengkap }}" width="100">
                            </td>
                        </tr>

                        <tr>
                            <td width="25%">Status Siswa</td>
                            <td>:
                                <span>
                                    @if ($data_afirmasi->status == 1)
                                        <span class="badge bg-success">Lulus</span>
                                    @elseif ($data_afirmasi->status == 2)
                                        <span class="badge bg-danger">Belum Lulus</span>
                                    @else
                                        <span class="badge bg-warning">Dalam Seleksi</span>
                                    @endif
                                </span>
                            </td>

                        </tr>

                        <tr>
                            <td>Nama Siswa</td>
                            <td style="text-transform: uppercase">: {{ $data_afirmasi->siswa->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>: {{ $data_afirmasi->siswa->nisn }}</td>
                        </tr>
                        <tr>
                            <td>Asal Sekolah</td>
                            <td>: {{ $data_afirmasi->siswa->sekolah_asal }}</td>
                        </tr>
                        <tr>
                            <td>Tempat / Tanggal Lahir</td>
                            <td>: {{ $data_afirmasi->siswa->tempat_tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>: {{ $data_afirmasi->siswa->agama }}</td>
                        </tr>
                        <tr>
                            <td>No Kartu Keluarga</td>
                            <td>: <span class="badge rounded-pill bg-info">{{ $data_afirmasi->siswa->no_kk }}</span></td>
                        </tr>
                    </table>
                </div>

                <form enctype="multipart/form-data" method="POST"
                    action="{{ route('data_pendaftaran_afirmasi.update', $data_afirmasi->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="table-responsive text-nowrap text-center">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>KK</th>
                                    <th>Surat Keterangan Lulus</th>
                                    <th>KIP</th>
                                    <th>Surat Keterangan Tidak Mampu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                <td>{{ $no++ }}</td>
                                <td>
                                    <a href="javascript:void(0)"
                                        onclick="popupCenter({url: '{{ Storage::url($data_afirmasi->kk) }}', title: 'Sertifikat', w: 800, h: 600});">
                                        Lihat KK
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)"
                                        onclick="popupCenter({url: '{{ Storage::url($data_afirmasi->skl) }}', title: 'Sertifikat', w: 800, h: 600});">
                                        Lihat SKL
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)"
                                        onclick="popupCenter({url: '{{ Storage::url($data_afirmasi->kip) }}', title: 'Sertifikat', w: 800, h: 600});">
                                        Lihat KIP
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)"
                                        onclick="popupCenter({url: '{{ Storage::url($data_afirmasi->sktm) }}', title: 'Sertifikat', w: 800, h: 600});">
                                        Lihat SKTM
                                    </a>
                                </td>
                                <td>

                                </td>
                            </tbody>
                        </table>
                    </div>


                    <div class="card-footer">
                        <a href="{{ route('data_pendaftaran_prestasi.index') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>

                        @if ($data_afirmasi->status == null)
                            <button type="submit" class="btn btn-dark mx-1"
                                onclick="return confirm('Apakah Kamu Yakin Ingin Mengupdate Status CPD Ini ?')">
                                Diterima ✅
                            </button>

                            <a href="{{ route('updateStatusDitolakAfirmasi', $data_afirmasi->id) }}" class="btn btn-dark">
                                Ditolak ❌
                            </a>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
