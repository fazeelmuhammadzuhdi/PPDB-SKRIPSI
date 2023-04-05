@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST"
                        action="{{ route('data_pendaftaran_pindah_tugas.update', $dataPindahTugas->id) }}">
                        @csrf
                        @method('PUT')
                        <table class="table table-sm mt-2">
                            <tr>
                                <td rowspan="9" width="100">
                                    <img src="{{ Storage::url($dataPindahTugas->siswa->foto ?? '') }}"
                                        alt="{{ $dataPindahTugas->siswa->nama_lengkap }}" width="100">
                                </td>
                            </tr>

                            <tr>
                                <td width="25%">Status Siswa</td>
                                <td>:
                                    <span>
                                        @if ($dataPindahTugas->status == 1)
                                            <span class="badge bg-success">Lulus</span>
                                        @elseif ($dataPindahTugas->status == 2)
                                            <span class="badge bg-danger">Belum Lulus</span>
                                        @else
                                            <span class="badge bg-warning">Dalam Seleksi</span>
                                        @endif
                                    </span>
                                </td>

                            </tr>

                            <tr>
                                <td>Nama Siswa</td>
                                <td style="text-transform: uppercase">: {{ $dataPindahTugas->siswa->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>: {{ $dataPindahTugas->siswa->nisn }}</td>
                            </tr>
                            <tr>
                                <td>Asal Sekolah</td>
                                <td>: {{ $dataPindahTugas->siswa->sekolah_asal }}</td>
                            </tr>
                            <tr>
                                <td>Tempat / Tanggal Lahir</td>
                                <td>: {{ $dataPindahTugas->siswa->tempat_tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>: {{ $dataPindahTugas->siswa->agama }}</td>
                            </tr>
                        </table>
                        <div class="mt-3">
                            <a href="{{ route('data_pendaftaran_prestasi.index') }}" class="btn btn-primary">
                                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>

                            <a href="#" class="btn btn-success">
                                <i class="fa fa-eye" aria-hidden="true"></i> View Bukti Surat Pindah</a>

                            @if ($dataPindahTugas->status == null)
                                <button type="submit" class="btn btn-dark mx-1">
                                    Diterima ✅
                                </button>

                                <a href="{{ route('updateStatusDitolak', $dataPindahTugas->id) }}" class="btn btn-dark">
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
