@extends('layouts.main', ['title' => 'Pengaturan Aplikasi'])

@section('content')
    @include('setting.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">

                    {!! Form::open([
                        'route' => 'setting.store',
                        'method' => 'POST',
                        'files' => true,
                    ]) !!}

                    <div class="form-group">
                        <label for="app_logo">Upload Logo Instansi</label>
                        {!! Form::file('app_logo', ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('app_logo') }}</span>
                        <img src="{{ Storage::url(settings()->get('app_logo')) }}" alt="" width="100"
                            class="mt-2">
                    </div>

                    <div class="form-group mt-3">
                        <label for="app_name">Nama Instansi</label>
                        {!! Form::text('app_name', settings()->get('app_name'), ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('app_name') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="app_email">Email Instansi</label>
                        {!! Form::text('app_email', settings()->get('app_email'), ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('app_email') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="app_phone">Nomor Telephone Instansi</label>
                        {!! Form::text('app_phone', settings()->get('app_phone'), ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('app_phone') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="app_address">Alamat Instansi</label>
                        {!! Form::textarea('app_address', settings()->get('app_address'), ['class' => 'form-control', 'id' => 'editor']) !!}
                        <span class="text-danger">{{ $errors->first('app_address') }}</span>
                    </div>
                    <hr style="border: 1px solid red">
                    <h5>Pengaturan Penanggung Jawab</h5>
                    <div class="alert alert-info" role="alert">
                        Data Penanggung Jawab Akan Ditampilkan Untuk Data Laporan
                    </div>
                    <div class="form-group mt-3">
                        <label for="pj_nama">Nama Penanggung Jawab</label>
                        {!! Form::text('pj_nama', settings()->get('pj_nama'), ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('pj_nama') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="pj_jabatan">Nama Jabatan (Ex : Bendahara)</label>
                        {!! Form::text('pj_jabatan', settings()->get('pj_jabatan'), ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('pj_jabatan') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="pj_ttd">Upload Gambar Tanda Tangan (Format: jpg,png Ukuran File Maks : 5Mb)</label>
                        {!! Form::file('pj_ttd', ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('pj_ttd') }}</span>
                        <img src="{{ Storage::url(settings()->get('pj_ttd')) }}" alt="" width="150">
                    </div>
                    {!! Form::submit('KIRIM', ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
