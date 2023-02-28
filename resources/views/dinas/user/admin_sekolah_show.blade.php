@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">{{ $title }}</h2> <small class="text-muted float-end">
                        <a href="{{ route($routePrefix . '.index') }}" class="btn btn-primary"> <i class="fa fa-backward"></i>
                            Kembali</a></small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <td>Hak Akses</td>
                                    <td>:</td>
                                    <td><span class="badge bg-info"><b>{{ $user->akses }}</b></span></td>
                                </tr>
                                <tr>
                                    <td width="20%">Nama</td>
                                    <td width="1%">:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>

                                <tr>
                                    <td>No Telpon</td>
                                    <td>:</td>
                                    <td>{{ $user->nohp }}</td>
                                </tr>
                            </thead>
                        </table>

                        @if ($user->sekolah?->sekolah_id == null)
                            <h4 class="my-3">Tambah Data Sekolah</h4>
                            {!! Form::open(['route' => 'sekolahadmin.store', 'method' => 'POST']) !!}
                            {!! Form::hidden('admin_sekolah_id', $user->id, []) !!}
                            <div class="form-group">
                                <label for="sekolah_id">Pilih Sekolah</label>
                                {!! Form::select('sekolah_id', $sekolah, null, [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Sekolah',
                                ]) !!}
                                <small class="text-danger">{{ $errors->first('sekolah_id') }}</small>
                            </div>
                            {!! Form::submit('SIMPAN', ['class' => 'btn btn-primary mt-3']) !!}
                            {!! Form::close() !!}
                        @endif


                        <h4 class="my-3">Data Sekolah</h4>
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sekolah</th>
                                    <th>NPSN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                <th>{{ $no++ }}</th>
                                <th>{{ $user->sekolah->nama ?? 'Belum Ada Sekolah' }}</th>
                                <th>{{ $user->sekolah->npsn ?? '-' }}</th>

                                {{-- @foreach ($user->sekolah as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->npsn }}</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
