@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3> <small class="text-muted float-end">
                </div>
                <div class="card-body">
                    {{-- <div class="table-responsive text-nowrap ">
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
                                        <td>{{ $item->tempat_tanggal_lahir }}</td>
                                        <td>
                                            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-edit"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> --}}
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="float-end">
                                        @if ($cek > 0)
                                            <a href="#" class="btn btn-primary mb-3"><i class="fa fa-user"></i> Daftar
                                                PPDB</a>
                                        @endif
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            @foreach ($siswa as $item)
                                                <tr>
                                                    <td rowspan="5">
                                                        <img src="{{ Storage::url($item->foto) }}" width="200px">
                                                        <a href="{{ route('siswa.edit', $item->id) }}"
                                                            class="btn btn-success mt-3 d-flex justify-content-center align-items-center">
                                                            <i class="fa fa-edit"> &nbsp; </i> Edit Data</a>
                                                    </td>
                                                    <td><b>NISN</b> :</td>
                                                    <td> {{ $item->nisn }}</td>
                                                    <td><b>NO KK</b> :</td>
                                                    <td>{{ $item->no_kk }}</td>
                                                    <td><b>NIK</b> :</td>
                                                    <td> {{ $item->no_nik }} </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Lengkap</b>:</td>
                                                    <td> {{ $item->nama_lengkap }}</td>
                                                    <td><b>Tempat Lahir</b> :</td>
                                                    <td> {{ $item->tempat_lahir }}</td>
                                                    <td><b>Tanggal Lahir</b>:</td>
                                                    <td> {{ $item->tanggal_lahir->format('d M Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Jenis Kelamin</b>:</td>
                                                    <td>{{ $item->jenis_kelamin == 'P' ? 'Laki - Laki' : 'Perempuan' }}</td>
                                                    <td><b>Agama</b> :</td>
                                                    <td> {{ $item->agama }}</td>
                                                    <td><b>Alamat Rumah</b> :</td>
                                                    <td> {{ $item->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Ayah</b> :</td>
                                                    <td> {{ $item->nama_ayah }}</td>
                                                    <td><b>Pekerjaan Ayah</b> :</td>
                                                    <td> {{ $item->pekerjaan_ayah }}</td>
                                                    <td><b>Penghasilan Ayah</b> :</td>
                                                    <td>{{ $item->penghasilan_ayah }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7"><b style="color:#ff6b81;">Upload foto dan silahkan
                                                            lakukan pendaftaran, klik <a href="#">Daftar
                                                                PPDB</a></b></td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-style')
    <style>
        .table td,
        .table th {
            padding: 0.625rem 1.4rem;
        }
    </style>
@endpush
