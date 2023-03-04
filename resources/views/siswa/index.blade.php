@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3> <small class="text-muted float-end">
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap ">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Alamat</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ Storage::url($item->foto) }}" alt=""
                                                class="img-thumbnail rounded-full" width="40px">
                                        </td>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                                        <td>
                                            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-edit"></i> Edit
                                            </a>
                                        </td>
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
