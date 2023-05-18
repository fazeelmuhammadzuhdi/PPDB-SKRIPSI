@extends('layouts.blank')
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
                                @foreach ($siswa as $item)
                                    @foreach ($afirmasi as $data)
                                        @if ($item->id == $data->siswa_id)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>AFIRMASI</td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->nisn }}</td>
                                                <td>{{ $item->jenis_kelamin }}</td>
                                                <td>{!! $item->alamat !!}</td>
                                                <td>{{ $item->sekolah_asal }}</td>

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
                                                <td>{!! $item->alamat !!}</td>
                                                <td>{{ $item->sekolah_asal }}</td>

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
                                                <td>{!! $item->alamat !!}</td>
                                                <td>{{ $item->sekolah_asal }}</td>

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
                                                <td>{!! $item->alamat !!}</td>
                                                <td>{{ $item->sekolah_asal }}</td>
                                            </tr>
                                        @endif
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
</script>
