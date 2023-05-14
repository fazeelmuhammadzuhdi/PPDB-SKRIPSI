@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        @if (Route::is('data_pendaftaran_afirmasi.index'))
                            SISWA YANG LULUS JALUR AFIRMASI
                        @else
                            SISWA BELUM YANG LULUS JALUR AFIRMASI
                        @endif
                    </h3> <small class="text-muted float-end">
                        <a href="{{ route('data_pendaftaran_prestasi.index') }}" class="btn btn-outline-dark btn-sm"><i
                                class="fas fa-backward"></i>
                            Kembali
                        </a>

                        @if (Route::is('data_pendaftaran_afirmasi.index'))
                            <a href="{{ route('exportExcelAfirmasiSiswaLulus') }}"
                                class="btn btn-outline-success btn-sm mx-2"><i class="fas fa-excel"></i>
                                <i class="fas fa-file-excel"></i>
                                Export Excel
                            </a>
                        @else
                            <a href="{{ route('exportExcelAfirmasiSiswaBelumLulus') }}"
                                class="btn btn-outline-success btn-sm mx-2"><i class="fas fa-excel"></i>
                                <i class="fas fa-file-excel"></i>
                                Export Excel
                            </a>
                        @endif

                        <button class="btn btn-outline-primary btn-sm" onclick="printDiv('cetak')"><i
                                class="fa fa-file-pdf"></i>
                            Export PDF
                        </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap" id="cetak">
                        <table class="table table-hover" id="myTableZonasi">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>NISN</th>
                                    <th>Status</th>
                                    <th>Foto</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($afirmasi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->siswa->nama_lengkap }}</td>
                                        <td>{{ $item->siswa->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                                        <td>{{ $item->siswa->nisn }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge bg-success">Lulus</span>
                                            @elseif ($item->status == 2)
                                                <span class="badge bg-danger">Belum Lulus</span>
                                            @else
                                                <span class="badge bg-warning">Dalam Seleksi</span>
                                            @endif
                                        </td>

                                        <td>
                                            <img src="{{ Storage::url($item->siswa->foto) }}" alt="" width="30">
                                        </td>
                                        <td>{!! $item->siswa->alamat !!}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#myTableZonasi').DataTable();
        });
    </script>
@endpush
