@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3> <small class="text-muted float-end">
                        <button type="button" class="btn btn-primary" id="btn-tambah" data-bs-toggle="modal"
                            data-bs-target="#addModalKategori">
                            <i class="bx bx-plus-circle" aria-hidden="true"></i> Tambah
                        </button>

                        <button class="btn btn-danger mx-2" type="submit" id="deleteAll">
                            <span class="bx bxs-trash-alt"></span>
                            Hapus
                        </button>

                        {{-- <button class="btn btn-flat btn-dark btn-refresh"><i class="fa fa-refresh"></i>
                            Refresh</button> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap ">
                        <table class="table table-striped" id="tableKategori">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="main_checkbox" id="main_checkbox">
                                        <label for=""></label>
                                    </th>
                                    <th width="1%">No</th>
                                    <th>Penghasilan</th>
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
    @include('dinas.penghasilan.addModalPenghasilan')
    @include('dinas.penghasilan.editModalPenghasilan')
@endsection

@push('after-script')
    @include('dinas.penghasilan.script')
@endpush
