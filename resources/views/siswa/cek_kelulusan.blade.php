@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="container-fluid pt-5">
                    <div class="text-center p-5">
                        <i class="fa fa-sticky-note text-primary" aria-hidden="true" style="font-size: 64px"></i>
                        <h4 class="my-3">Apapun Hasilnya</h4>
                        <p>Itulah yang terbaik. Semangat!!</p>

                        <button type="button" class="btn btn-primary" id="btn-tambah" data-bs-toggle="modal"
                            data-bs-target="#modalPekerjaan">
                            <i class="fa fa-fingerprint mr-2"></i> Cek</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPekerjaan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Cek Kelulusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cek_hasil_kelulusan') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label for="cari" class="form-label">No Pendaftaran</label>
                                <input type="text" name="cari" required class="form-control"
                                    placeholder="Masukkan No Pendaftaran .." value="{{ old('cari') }}">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between m-0 p-0">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                id="btn-tutup">Close</button>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
