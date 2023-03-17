@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Jalur Pendaftaran Prestasi</h3> <small class="text-muted float-end">
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap ">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>NISN</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($prestasi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->siswa->nama_lengkap }}</td>
                                        <td>{{ $item->siswa->jenis_kelamin }}</td>
                                        <td>{{ $item->siswa->nisn }}</td>
                                        <td>
                                            <img src="{{ Storage::url($item->siswa->foto) }}" alt="" width="30">
                                        </td>
                                        <td></td>
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
