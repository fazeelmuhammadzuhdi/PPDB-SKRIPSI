@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Data Prestasi</h3> <small class="text-muted float-end">
                        <a href="{{ route('prestasi.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap ">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Alamat</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
