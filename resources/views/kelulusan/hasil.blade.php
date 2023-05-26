@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Applications</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active">Kampung</li>
            </ol>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        Data Siswa Lulus {{ $sekolah->nama }}
                    </h3>
                    <button onclick="window.print()" class="btn btn-primary ml-auto"><i class="fa fa-print"
                            aria-hidden="true"></i> Cetak</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="myTableKampung">
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


                                {{-- @foreach ($siswa->sortByDesc('kampung_id') as $item)
                                    @foreach ($afirmasi as $data)
                                        @if ($item->id == $data->siswa_id)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>AFIRMASI</td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->nisn }}</td>
                                                <td>{{ $item->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                                                <td>{{ $item->kampung?->nama_kampung }}</td>
                                            </tr>
                                        @endif
                                    @endforeach

                                    @foreach ($pindahTugas as $data)
                                        @if ($item->id == $data->siswa_id)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>PINDAH TUGAS</td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->nisn }}</td>
                                                <td>{{ $item->jenis_kelamin }}</td>
                                                <td>{{ $item->kampung?->nama_kampung }}</td>
                                            </tr>
                                        @endif
                                    @endforeach

                                    @foreach ($prestasi as $data)
                                        @if ($item->id == $data->siswa_id)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>PRESTASI</td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->nisn }}</td>
                                                <td>{{ $item->jenis_kelamin }}</td>
                                                <td>{{ $item->kampung?->nama_kampung }}</td>
                                            </tr>
                                        @endif
                                    @endforeach

                                    @foreach ($zonasi as $data)
                                        @if ($item->id == $data->siswa_id)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>ZONASI</td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->nisn }}</td>
                                                <td>{{ $item->jenis_kelamin }}</td>
                                                <td>{{ $item->kampung?->nama_kampung }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
