@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Applications</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active">Lihat Kelulusan</li>
            </ol>
            <div class="card">
                <div class="card-header ">
                    <form action="{{ route('kelulusan.sekolah') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <select class="form-control select2" name="id_sekolah" required>
                                <option value="">-- Pilih Sekolah --</option>
                                @foreach ($sekolah as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit"><i class="bx bx-show"></i> Lihat Data
                            Kelulusan</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
