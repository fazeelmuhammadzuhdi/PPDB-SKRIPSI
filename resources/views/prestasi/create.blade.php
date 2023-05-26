@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert" role="alert" style="background-color:#83ae14b3; color:#000000;">
                <p class="mb-0"><b>Perhatian !</b> Seluruh Dokumen <b>Yang diunggah Harus Asli</b> dan
                    Dapat Dilihat Dengan Jelas Dan Terbaca</p>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Data Nilai Rapor</h3> <small class="text-muted float-end">
                </div>
                <div class="container">
                    <small class="text-danger">* Kamu Lebih Di Prioritaskan Sekolah Yang Dalam Zonasi</small><br>
                    <small class="text-danger">* Upload Nilai Rapor SD Semester 4 - 6, Format Pdf, (Maksimal Ukuran 2
                        Mb)</small><br>
                    <small class="text-danger">* Sertifikat Prestasi Harus Yang Asli (Maksimal Ukuran 2
                        Mb)</small><br>

                </div>
                <form enctype="multipart/form-data" method="POST" action="{{ route('prestasi.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="k4sm2" class="form-label">Kelas 4 Semester 2</label>
                                <input type="number" class="form-control @error('k4sm2') is-invalid @enderror"
                                    id="k4sm2" name="k4sm2" placeholder="Nilai Rapor Kelas 4 Sem 2 Ex: 90"
                                    value="{{ old('k4sm2') }}" autofocus>

                                @error('k4sm2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-4 mb-3 ">
                                <label for="k5sm1" class="form-label">Kelas 5 Semester 1</label>
                                <input type="number" class="form-control @error('k5sm1') is-invalid @enderror"
                                    id="k5sm1" name="k5sm1" placeholder="Nilai Rapor Kelas 5 Sem 1 Ex: 90"
                                    value="{{ old('k5sm1') }}" autofocus>

                                @error('k5sm1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group col-4">
                                <label for="k5sm2" class="form-label">Kelas 5 Semester 2</label>
                                <input type="number" class="form-control @error('k5sm2') is-invalid @enderror"
                                    id="k5sm2" name="k5sm2" placeholder="Nilai Rapor Kelas 5 Sem 2 Ex: 90"
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
                                <input type="number" class="form-control @error('k6sm1') is-invalid @enderror"
                                    id="k6sm1" name="k6sm1" placeholder="Nilai Rapor Kelas 6 Sem 1 Ex: 90"
                                    value="{{ old('k6sm1') }}" autofocus>

                                @error('k6sm1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-4 mb-3">
                                <label for="k6sm2" class="form-label">Kelas 6 Semester 2</label>
                                <input type="number" class="form-control @error('k6sm2') is-invalid @enderror"
                                    id="k6sm2" name="k6sm2" placeholder="Nilai Rapor Kelas 6 Sem 2 Ex: 90"
                                    value="{{ old('k6sm2') }}" autofocus>

                                @error('k6sm2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-4 mb-3">
                                <label for="bukti_nilai_rapor" class="form-label">Bukti Nilai Rapor </label>
                                <input type="file" class="form-control @error('bukti_nilai_rapor') is-invalid @enderror"
                                    id="bukti_nilai_rapor" name="bukti_nilai_rapor" accept="application/pdf">

                                @error('bukti_nilai_rapor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-12">
                                <label for="sekolah_id" class="form-label">Sekolah Tujuan</label>
                                {!! Form::select('sekolah_id', $sekolah, null, [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Nama Sekolah Tujuan',
                                ]) !!}
                                <small class="text-danger">{{ $errors->first('sekolah_id') }}</small>
                            </div>
                        </div>

                        <h3 class="mb-3">Data Penghargaan / Prestasi</h3> <small class="text-muted float-end">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>Nama Penghargaan</th>
                                        <th width="12%">Tahun</th>
                                        <th width="25%">File / Foto Sertifikat</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="nama_penghargaan[]"
                                                placeholder="Masukkan Penghargaan" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="tahun[]" placeholder="2023"
                                                required>
                                        </td>
                                        <td><input type="file" class="form-control" name="file[]" accept="image/*"
                                                required></td>
                                        <td><button type="button" name="add" id="add"
                                                class="btn btn-success"><i class="fa fa-plus-circle"></i> Add</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <input type="checkbox" name="acknowledge" class="mt-3" required>
                            <label for="acknowledge" class="text-danger">Saya menyatakan bahwa data yang saya isi adalah
                                benar, dan bersedia
                                menerima sanksi jika terdapat pemalsuan data.</label>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('Apakah Anda Yakin Ingin Mendaftar Di Sekolah Ini ?')"><i
                                class="fa-sharp fa-solid fa-clipboard-list me-1"></i>
                            Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('after-script')
    <script>
        $(document).ready(function() {
            var i = 0;
            $('#add').click(function() {
                i++;
                $('#table').append(
                    `<tr>
                        <td>
                            <input type="text" name="nama_penghargaan[]" placeholder="Masukkan Penghargaan" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="tahun[]" placeholder="2023" class="form-control">
                        </td>
                        <td>
                            <input type="file" name="file[]"  class="form-control">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove">Remove</button>
                        </td>
                            
                    </tr>`);
            });

            $(document).on('click', '.remove', function() {
                $(this).parents('tr').remove();
            });

        });
    </script>
@endpush
