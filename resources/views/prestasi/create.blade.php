@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Data Nilai Rapor</h3> <small class="text-muted float-end">

                </div>
                <form enctype="multipart/form-data" method="POST" action="{{ route('prestasi.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="k4sm2" class="form-label">Kelas 4 Semester 2</label>
                                <input type="text" class="form-control @error('k4sm2') is-invalid @enderror"
                                    id="k4sm2" name="k4sm2" placeholder="Nilai Rapor Kelas 4 Semestr 2 Ex: 90"
                                    value="{{ old('k4sm2') }}" autofocus>

                                @error('k4sm2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-4 mb-3 ">
                                <label for="k5sm1" class="form-label">Kelas 5 Semester 1</label>
                                <input type="text" class="form-control @error('k5sm1') is-invalid @enderror"
                                    id="k5sm1" name="k5sm1" placeholder="Nilai Rapor Kelas 5 Semestr 1 Ex: 90"
                                    value="{{ old('k5sm1') }}" autofocus>

                                @error('k5sm1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group col-4">
                                <label for="k5sm2" class="form-label">Kelas 5 Semester 2</label>
                                <input type="text" class="form-control @error('k5sm2') is-invalid @enderror"
                                    id="k5sm2" name="k5sm2" placeholder="Nilai Rapor Kelas 5 Semestr 2 Ex: 90"
                                    value="{{ old('k5sm2') }}" autofocus>

                                @error('k5sm2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-4">
                                <label for="k6sm1" class="form-label">Kelas 6 Semester 1</label>
                                <input type="text" class="form-control @error('k6sm1') is-invalid @enderror"
                                    id="k6sm1" name="k6sm1" placeholder="Nilai Rapor Kelas 6 Semestr 1 Ex: 90"
                                    value="{{ old('k6sm1') }}" autofocus>

                                @error('k6sm1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-4 mb-3">
                                <label for="k6sm2" class="form-label">Kelas 6 Semester 2</label>
                                <input type="text" class="form-control @error('k6sm2') is-invalid @enderror"
                                    id="k6sm2" name="k6sm2" placeholder="Nilai Rapor Kelas 6 Semestr 2 Ex: 90"
                                    value="{{ old('k6sm2') }}" autofocus>

                                @error('k6sm2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            {{-- <div class="form-group col-4">
                                <label for="jumlah_sm" class="form-label">Jumlah Nilai / Rata - Rata</label>
                                <input type="text" class="form-control @error('jumlah_sm') is-invalid @enderror"
                                    id="jumlah_sm" name="jumlah_sm" placeholder="Nilai Rapor Kelas 4 Semestr 2 Ex: 90"
                                    value="{{ old('jumlah_sm') }}" autofocus>

                                @error('jumlah_sm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}

                            <div class="form-group col-4">
                                <label for="sekolah_id" class="form-label">Nama Sekolah Pendaftaran</label>
                                {!! Form::select('sekolah_id', $sekolah, null, [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Nama Sekolah',
                                ]) !!}
                                <small class="text-danger">{{ $errors->first('sekolah_id') }}</small>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
