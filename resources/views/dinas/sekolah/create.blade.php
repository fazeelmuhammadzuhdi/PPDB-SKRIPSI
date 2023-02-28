@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3> <small class="text-muted float-end"><a
                            href="{{ route($routePrefix . '.index') }}" class="btn btn-secondary"> <i
                                class="fa fa-backward"></i>
                            Kembali</a></small>
                </div>
                <div class="card-body">
                    {!! Form::model($sekolah, ['route' => $route, 'method' => $method]) !!}
                    {{-- <div class="form-group">
                        <label for="sekolah_id">Nama Operator Sekolah</label>
                        {!! Form::select('sekolah_id', $listUser, null, [
                            'class' => 'form-control select2',
                            'placeholder' => 'Pilih Nama Operator',
                        ]) !!}
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div> --}}
                    @if (Route::is('sekolah.create'))
                        <div class="form-group">
                            <label for="npsn">NPSN Sekolah</label>
                            {!! Form::text('npsn', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Inputkan NPSN Sekolah',
                                'autofocus' => true,
                            ]) !!}
                            <small class="text-danger">{{ $errors->first('npsn') }}</small>
                        </div>
                    @else
                        <div class="form-group mt-3">
                            <label for="npsn">NPSN Sekolah</label>
                            {!! Form::text('npsn', null, [
                                'class' => 'form-control',
                                'readonly' => true,
                            ]) !!}
                            <small class="text-danger">{{ $errors->first('npsn') }}</small>
                        </div>
                    @endif


                    <div class="form-group mt-3">
                        <label for="nama">Nama Sekolah</label>
                        {!! Form::text('nama', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Inputkan Nama Sekolah',
                            'autofocus' => true,
                        ]) !!}
                        <small class="text-danger">{{ $errors->first('nama') }}</small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="alamat">Alamat Sekolah</label>
                        {{ Form::textarea('alamat', null, ['class' => 'form-control', 'cols' => 3, 'rows' => 2, 'maxlength' => '400']) }}
                        <small class="text-danger">{{ $errors->first('alamat') }}</small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="notelp">No Handphone Sekolah</label>
                        {!! Form::text('notelp', null, ['class' => 'form-control', 'placeholder' => 'Inputkan No Hp Sekolah']) !!}
                        <small class="text-danger">{{ $errors->first('notelp') }}</small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="akreditasi">Akreditasi Sekolah</label>
                        {!! Form::select(
                            'akreditasi',
                            [
                                'A' => 'A',
                                'B' => 'B',
                                'C' => 'C',
                            ],
                            null,
                            ['class' => 'form-control', 'placeholder' => 'Pilih Akreditasi Sekolah'],
                        ) !!}
                        <small class="text-danger">{{ $errors->first('akreditasi') }}</small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="kecamatan">Kecamatan Sekolah</label>
                        {!! Form::text('kecamatan', null, ['class' => 'form-control', 'placeholder' => 'Inputkan Kecamaan Sekolah']) !!}
                        <small class="text-danger">{{ $errors->first('kecamatan') }}</small>
                    </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
