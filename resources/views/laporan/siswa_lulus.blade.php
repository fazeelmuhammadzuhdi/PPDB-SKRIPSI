{{-- @extends('layouts.blank')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('laporan.header')
                    <div class="table-responsive text-nowrap mt-3">
                        <table class="table table-striped table-hover table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Jalur Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Asal Sekolah</th>
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
                                            <td>{{ $item->sekolah_asal }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="mt-3">
                        <tr>
                            <td colspan="2">
                                Painan, {{ now()->format('d F Y') }} <br>
                                @include('siswa.informasi_penanggung_jawab')
                            </td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    window.print()
</script> --}}

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Siswa Lulus</title>
    @include('laporan.style_header_coba')
</head>

<body>
    <center>
        @include('laporan.header_coba')

        <table class="head">
            <tr>
                @if (Route::is('cetakpdf'))
                    <h1>Data Siswa Yang Lulus</h1>
                @else
                    <h1>Data Siswa Yang Belum Lulus</h1>
                @endif
            </tr>
        </table>
        @php
            $sekarang = now();
        @endphp

        <div class="filter-tanggal">
            <table>
                <tr>
                    <td style="width: 55%">Nama Sekolah</td>
                    <td>: {{ $sekolah->nama }}</td>
                </tr>
                <br>
                <tr>
                    <td>Akreditasi Sekolah</td>
                    <td>: {{ $sekolah->akreditasi }}</td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>: {{ now()->format('Y') }} / {{ now()->addYears(1)->format('Y') }}</td>
                </tr>
                <tr>
                    <td>Tanggal Cetak</td>
                    <td>: {{ \Carbon\Carbon::parse($sekarang)->formatLocalized('%d %B %Y %H:%M:%S') }}</td>
                </tr>
            </table>

        </div>
        <table border="1" class="body">
            <thead>
                <tr style="height: 25px;">
                    <th>No</th>
                    <th>Jalur Pendaftaran</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Asal Sekolah</th>
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
                            <td>{{ $item->sekolah_asal }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        @include('laporan.tanda_tangan')
    </center>
</body>

<script>
    window.print();
</script>

</html>
