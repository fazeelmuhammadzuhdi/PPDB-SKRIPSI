@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="alert" role="alert" style="background-color:#83ae14b3; color:#000000;">
                <p class="mb-0"><b>Perhatian !</b> Seluruh Dokumen <b>Yang diunggah harus Asli</b> dan
                    dipindai / scan dengan jelas dan terbaca</p>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Pendaftaran Perpindahan Tugas Orang Tua</h3> <small class="text-muted float-end">
                </div>

                <form enctype="multipart/form-data" method="POST" action="{{ route('pindahtugas.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="sekolah_id" class="form-label">Sekolah Tujuan</label>
                                <select name="sekolah_id" class="form-control select2">
                                    <option value="">Pilih Sekolah</option>
                                    @foreach ($sekolah as $item)
                                        <option value="{{ $item->id }}">{{ $item->npsn }} | {{ $item->nama }}
                                        </option>
                                    @endforeach

                                    @error('sekolah_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </select>

                            </div>

                            <div class="form-group mt-3">
                                <label for="file" class="form-label">Surat Keterangan Pindah Tugas</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file" required>
                                <small class="text-danger">Format Gambar / Foto JPG, JPEG, PNG (Maksimal Ukuran 2
                                    Mb)</small>
                                @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i
                                class="fa-sharp fa-solid fa-clipboard-list me-1"></i>
                            Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
