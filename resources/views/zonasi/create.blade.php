@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Pendaftaran Melalui Zonasi</h3> <small class="text-muted float-end">
                </div>

                <form enctype="multipart/form-data" method="POST" action="{{ route('zonasi.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="sekolah_id" class="form-label">Sekolah Tujuan</label>
                                <select name="sekolah_id" class="form-control select2" required>
                                    <option value="">Pilih Sekolah</option>
                                    @foreach ($sekolah as $item)
                                        @foreach ($siswa as $data)
                                            @if ($item->kampung_id == $data->kampung_id)
                                                <option value="{{ $item->sekolah->id }}">{{ $item->sekolah->npsn }} |
                                                    {{ $item->sekolah->nama }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endforeach

                                    @error('sekolah_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </select>
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
