@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 text-primary">Data Peserta Didik Yang Telah Mendaftar Di {{ $sekolah->nama }} Tahun
                        Ajaran {{ $now }} / {{ now()->addYears('1')->format('Y') }}</h3> <small
                        class="text-muted float-end">
                        <a href="{{ route('cetakPdfDataPendaftar') }}" class="btn btn-primary" target="_blank"><i
                                class="fa fa-file-pdf" aria-hidden="true"></i>
                            Export</a>
                        {{-- <a href="{{ route('exportExcelSiswaLulus') }}" class="btn btn-outline-success"><i
                                class="fas fa-file-excel" aria-hidden="true"></i>
                            Export Excel</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap ">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Jalur Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @php
                                    $dataByJalur = [
                                        'AFIRMASI' => [],
                                        'PINDAH TUGAS' => [],
                                        'PRESTASI' => [],
                                        'ZONASI' => [],
                                    ];
                                @endphp

                                @foreach ($siswa as $item)
                                    @foreach ($afirmasi as $data)
                                        @if ($item->id == $data->siswa_id)
                                            @php
                                                $dataByJalur['AFIRMASI'][] = $item;
                                            @endphp
                                        @endif
                                    @endforeach

                                    @foreach ($pindahTugas as $data)
                                        @if ($item->id == $data->siswa_id)
                                            @php
                                                $dataByJalur['PINDAH TUGAS'][] = $item;
                                            @endphp
                                        @endif
                                    @endforeach

                                    @foreach ($prestasi as $data)
                                        @if ($item->id == $data->siswa_id)
                                            @php
                                                $dataByJalur['PRESTASI'][] = $item;
                                            @endphp
                                        @endif
                                    @endforeach

                                    @foreach ($zonasi as $data)
                                        @if ($item->id == $data->siswa_id)
                                            @php
                                                $dataByJalur['ZONASI'][] = $item;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endforeach

                                @foreach ($dataByJalur as $jalur => $data)
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $jalur }}</td>
                                            <td>{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->nisn }}</td>
                                            <td>{{ $item->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                                            <td>{{ $item->kampung?->nama_kampung }}</td>
                                        </tr>
                                    @endforeach
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
            $('#table').DataTable();
        });
    </script>
@endpush
