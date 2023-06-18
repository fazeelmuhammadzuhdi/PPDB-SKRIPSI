@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3> <small class="text-muted float-end">
                        <a href="{{ route($routePrefix . '.index') }}" class="btn btn-secondary"> <i
                                class="fa fa-backward"></i>
                            Kembali</a></small>
                </div>
                <div class="card-body">
                    {!! Form::model($user, ['route' => $route, 'method' => $method]) !!}
                    <div class="form-group">
                        <label for="name">Nama</label>
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Inputkan Nama', 'autofocus' => true]) !!}
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email / Username</label>
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Inputkan Email / Username']) !!}
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nohp">No Handphone</label>
                        {!! Form::text('nohp', null, ['class' => 'form-control', 'placeholder' => 'Inputkan No HP']) !!}
                        <small class="text-danger">{{ $errors->first('nohp') }}</small>
                    </div>
                    @if (Route::is('user.create'))
                        <div class="form-group mt-3">
                            <label for="akses">Hak Akses</label>
                            {!! Form::select(
                                'akses',
                                [
                                    'Admin Dinas' => 'Admin Dinas Pendidikan',
                                    'Admin Sekolah' => 'Admin Sekolah',
                                    // 'Kepala Dinas' => 'Kepala Dinas Pendidikan',
                                ],
                                null,
                                ['class' => 'form-control select2', 'placeholder' => 'Pilih Hak Akses'],
                            ) !!}
                            <small class="text-danger">{{ $errors->first('akses') }}</small>
                        </div>
                    @endif

                    @if (Route::is('user.edit'))
                        <div class="form-group mt-3">
                            <label for="akses">Hak Akses</label>
                            {!! Form::select(
                                'akses',
                                [
                                    'Admin Dinas' => 'Admin Dinas Pendidikan',
                                    'Admin Sekolah' => 'Admin Sekolah',
                                ],
                                null,
                                ['class' => 'form-control select2', 'placeholder' => 'Pilih Hak Akses'],
                            ) !!}
                            <small class="text-danger">{{ $errors->first('akses') }}</small>
                        </div>
                    @endif


                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
