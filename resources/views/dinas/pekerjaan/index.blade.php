@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3> <small class="text-muted float-end">
                        <button type="button" class="btn btn-primary" id="btn-tambah" data-bs-toggle="modal"
                            data-bs-target="#modalPekerjaan">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                        </button>

                        <button class="btn btn-flat btn-dark btn-refresh mx-2"><i class="fa fa-refresh"></i>
                            Refresh
                        </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap ">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Pekerjaan</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Penghasilan -->
    @include('dinas.pekerjaan.modal_pekerjaan')
@endsection

@push('after-script')
    @include('dinas.pekerjaan.script')
@endpush
