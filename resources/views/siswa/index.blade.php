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
                                                    class="bx bx-edit-alt"></i> Edit
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
                                            <a href="{{ route('jalur_pendaftaran') }}" class="btn btn-primary mb-3">
                                                <i class="bx bx-user"></i> Daftar
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
                                                    <td rowspan="6">
                                                        {{-- <img src="{{ Storage::url($item->foto) }}" width="200px"> --}}
                                                        <img src="{{ Storage::url($item->foto) }}" width="200px">
                                                        <a href="{{ route('siswa.edit', encrypt($item->id)) }}"
                                                            class="btn btn-success mt-5 d-flex justify-content-center align-items-center">
                                                            <i class="bx bx-edit mx-1"></i> Edit Data</a>
                                                    </td>
                                                    <td><b>No Pendaftaran</b>:</td>
                                                    <td><span class="badge rounded bg-primary fw-bold">
                                                            {{ $item->no_pendaftaran }}
                                                        </span>
                                                    </td>
                                                    <td><b>NISN</b> :</td>
                                                    <td>
                                                        <span class="badge rounded bg-success fw-bold">
                                                            {{ $item->nisn }}
                                                        </span>
                                                    </td>
                                                    <td><b>NO KK</b> :</td>
                                                    <td>
                                                        <span class="badge rounded bg-dark fw-bold">
                                                            {{ $item->no_kk }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Lengkap</b>:</td>
                                                    <td> {{ $item->nama_lengkap }}</td>
                                                    <td><b>TTL</b> :</td>
                                                    <td> {{ $item->tempat_tanggal_lahir }} </td>
                                                    <td><b>NIK</b> :</td>
                                                    <td> {{ $item->no_nik }} </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Jenis Kelamin</b>:</td>
                                                    <td>{{ $item->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}
                                                    </td>
                                                    <td><b>Agama</b> :</td>
                                                    <td> {{ $item->agama }}</td>
                                                    <td><b>Alamat Rumah</b> :</td>
                                                    <td> {!! $item->alamat !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Ayah</b>:</td>
                                                    <td> {{ $item->nama_ayah }}</td>
                                                    <td><b>Pekerjaan Ayah</b> :</td>
                                                    <td> {{ $item->pekerjaan_ayah }}</td>
                                                    <td><b>Penghasilan Ayah</b> :</td>
                                                    <td>{{ $item->penghasilan_ayah }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama <br> Ibu</b> :</td>
                                                    <td> {{ $item->nama_ibu }}</td>
                                                    <td><b>Pekerjaan Ibu</b> :</td>
                                                    <td> {{ $item->pekerjaan_ibu }}</td>
                                                    <td><b>Penghasilan Ibu</b> :</td>
                                                    <td>{{ $item->penghasilan_ibu }}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Kecamatan</b> :</td>
                                                    <td> {{ $item->kecamatan?->nama_kecamatan }}</td>
                                                    <td><b>Nagari</b> :</td>
                                                    <td> {{ $item->nagari?->nama_nagari }}</td>
                                                    <td><b>Kampung</b> :</td>
                                                    <td>{{ $item->kampung?->nama_kampung }}</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="7"><b style="color:#ff6b81;">Upload foto
                                                            dan Silahkan
                                                            Lakukan Pendaftaran, Klik <a
                                                                href="{{ route('jalur_pendaftaran') }}">Daftar PPDB</a></b>
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
            </div>
        </div>
    </div>
@endsection

@push('after-style')
    <style>
        .table td,
        .table th {
            padding: 0.9rem 0.9rem;
        }
    </style>
@endpush
