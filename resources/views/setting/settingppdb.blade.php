@extends('layouts.main', ['title' => 'Pengaturan PPDB'])

@section('content')
    @include('setting.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">

                    {!! Form::open([
                        'route' => 'settingppdb.store',
                        'method' => 'POST',
                        'files' => true,
                    ]) !!}

                    <div class="form-group">
                        <label for="awal_pendaftaran">Awal Pendaftaran</label>
                        {{ Form::date('awal_pendaftaran', settings()->get('awal_pendaftaran'), ['class' => 'form-control', 'id' => 'datetimepicker']) }}
                        {{-- {{ Form::date('awal_pendaftaran', null, ['class' => 'form-control']) }} --}}
                        <span class="text-danger">{{ $errors->first('awal_pendaftaran') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="akhir_pendaftaran">Akhir Pendaftaran</label>
                        {{ Form::date('akhir_pendaftaran', settings()->get('akhir_pendaftaran'), ['class' => 'form-control', 'id' => 'datetimepicker']) }}

                        <span class="text-danger">{{ $errors->first('akhir_pendaftaran') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="jadwa_kelulusan">Informasi Kelulusan</label>
                        {{ Form::date('jadwa_kelulusan', settings()->get('jadwa_kelulusan'), ['class' => 'form-control', 'id' => 'datetimepicker']) }}

                        <span class="text-danger">{{ $errors->first('jadwa_kelulusan') }}</span>
                    </div>


                    {!! Form::submit('SIMPAN', ['class' => 'btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('after-style')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
@endpush
@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
    </script>
    <script>
        $('#datetimepicker').datetimepicker({
            format: 'yyyy-mm-dd hh:mm:ss'
        })
    </script>
@endpush --}}
