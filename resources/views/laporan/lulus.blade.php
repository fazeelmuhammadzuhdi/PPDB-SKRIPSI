@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 text-primary">Data Siswa Lulus {{ $sekolah->nama }}</h3> <small
                        class="text-muted float-end">
                        <a href="{{ route('cetakpdf') }}" class="btn btn-primary" target="_blank"><i class="fa fa-file-pdf"
                                aria-hidden="true"></i>
                            Export</a>
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
                                            </tr>
                                        @endif
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
