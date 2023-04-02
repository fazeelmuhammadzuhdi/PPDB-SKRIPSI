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
                    <h3 class="mb-0">Pendaftaran Jalur Afirmasi</h3> <small class="text-muted float-end">
                </div>

                <form enctype="multipart/form-data" method="POST" action="{{ route('afirmasi.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="sekolah_id" class="form-label">Sekolah Tujuan</label>
                                {{-- <select name="sekolah_id" class="form-control select2">
                                    <option value="">Pilih Sekolah</option>
                                    @foreach ($sekolah as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select> --}}
                                {!! Form::select('sekolah_id', $sekolah, null, [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Nama Sekolah Tujuan',
                                ]) !!}
                                <small class="text-danger">{{ $errors->first('sekolah_id') }}</small>
                            </div>

                            <div class="form-group mt-3">
                                <label for="kk" class="form-label">Kartu Keluarga</label>
                                <input type="file" class="form-control @error('kk') is-invalid @enderror" id="kk"
                                    name="kk" accept="image/*" required>
                                <small class="text-danger">Format Gambar / Foto JPG, JPEG, PNG (Maksimal Ukuran 2
                                    Mb)</small>
                                @error('kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="kip" class="form-label">KIP / KKS</label>
                                <input type="file" class="form-control @error('kip') is-invalid @enderror" id="kip"
                                    name="kip" accept="image/*">
                                <small class="text-danger">Format Gambar / Foto JPG, JPEG, PNG (Maksimal Ukuran 2
                                    Mb) * Jika Ada SKTM Boleh Dikosongkan</small>
                                @error('kip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="sktm" class="form-label">Surat Keterangan Tidak Mampu (SKTM)</label>
                                <input type="file" class="form-control @error('sktm') is-invalid @enderror"
                                    id="sktm" name="sktm" accept="image/*">
                                <small class="text-danger">Format Gambar / Foto JPG, JPEG, PNG (Maksimal Ukuran 2
                                    Mb)</small>
                                @error('sktm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="skl" class="form-label">Surat Keterangan Lulus / Ijazah SD</label>
                                <input type="file" class="form-control @error('skl') is-invalid @enderror" id="skl"
                                    name="skl" accept="image/*" required>
                                <small class="text-danger">Format Gambar / Foto JPG, JPEG, PNG (Maksimal Ukuran 2
                                    Mb)</small>
                                @error('skl')
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
