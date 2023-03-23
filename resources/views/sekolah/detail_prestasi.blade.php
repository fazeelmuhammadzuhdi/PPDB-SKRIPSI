@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0" style="color:#8e44ad">Data Nilai Rapor {{ $data_prestasi->siswa->nama_lengkap }}</h4>
                    <small class="text-muted float-end">

                </div>
                <form enctype="multipart/form-data" method="POST"
                    action="{{ route('data_pendaftaran_prestasi.update', $data_prestasi->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="k4sm2" class="form-label fw-bold">Kelas 4 Semester 2</label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->k4sm2 }}">
                            </div>

                            <div class="form-group col-4 mb-3 ">
                                <label for="k5sm1" class="form-label fw-bold">Kelas 5 Semester 1</label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->k5sm1 }}">
                            </div>


                            <div class="form-group col-4">
                                <label for="k5sm2" class="form-label fw-bold">Kelas 5 Semester 2</label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->k5sm2 }}">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-4">
                                <label for="k6sm1" class="form-label fw-bold">Kelas 6 Semester 1</label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->k6sm1 }}">
                            </div>
                            <div class="form-group col-4 mb-3">
                                <label for="k6sm2" class="form-label fw-bold">Kelas 6 Semester 2</label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->k6sm2 }}">
                            </div>


                            <div class="form-group col-4">
                                <label for="jumlah_sm" class="form-label fw-bold">Rata - Rata Nilai Rapor
                                    <small>*Pembulatan</small></label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->jumlah }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <hr style="border: 1px solid gray">
                        </div>

                        <a href="{{ route('data_pendaftaran_prestasi.index') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>

                        @if ($data_prestasi->status == null)
                            <button type="submit" class="btn btn-dark mx-1">
                                Diterima ✅
                            </button>

                            <a href="{{ route('updateStatusDitolak', $data_prestasi->id) }}" class="btn btn-dark mx-1">
                                Ditolak ❌
                            </a>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </form>

            </div>
        </div>
    </div>
@endsection