@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Creata Data Kampung</h3> <small class="text-muted float-end">
                </div>

                <form enctype="multipart/form-data" method="POST" action="{{ route('kampung.update', $kampung->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="sekolah_id" class="form-label">Nama Kampung</label>
                                <input type="text" class="form-control @error('nama_kampung') is-invalid @enderror"
                                    name="nama_kampung" value="{{ old('kampung', $kampung->nama_kampung) }}" autofocus>
                                @error('nama_kampung')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="kk" class="form-label">Nama Nagari</label>
                                <select name="nagari_id" id="nagari_id" class="form-control select2">
                                    <option value="{{ $kampung->id }}" selected>{{ $kampung->nagari->nama_nagari }}
                                    </option>
                                    @foreach ($nagari as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_nagari }}</option>
                                    @endforeach
                                </select>
                                @error('nagari_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="kecamatan_id" class="form-label">Nama Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control select2">
                                    <option value="{{ $kampung->id }}" selected>{{ $kampung->kecamatan->nama_kecamatan }}
                                    </option>
                                    @foreach ($kecamatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                                @error('kecamatan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-sharp fa-solid fa-clipboard-list me-1"></i>
                            Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
