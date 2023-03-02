@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3> <small class="text-muted float-end">
                        <button type="button" class="btn btn-primary" id="btn-tambah" data-bs-toggle="modal"
                            data-bs-target="#modalPenghasilan">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                        </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap ">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
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
    <!-- Modal -->
    <div class="modal fade" id="modalPenghasilan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penghasilan.store') }}" method="POST" id="forms">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama" class="form-label">Name</label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    placeholder="Enter Penghasilan">
                                <input type="text" hidden class="form-control" name="id" id="id"
                                    placeholder="Inputkan Penghasilan">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                id="btn-tutup">Close</button>
                            <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('penghasilan.index') }}',
                columns: [{
                        data: null,
                        "sortable": false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false
                    },
                ]
            });
        });

        $(document).on('submit', 'form', function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                typeData: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    $('#btn-tutup').click()
                    $('#table').DataTable().ajax.reload()
                    $('#nama').val('');
                    toastr.success(response.text, 'Success')
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.text, 'Gagal!')
                }
            });
        })

        $(document).on('click', '.edit', function() {
            $('#forms').attr('action', "{{ route('penghasilan.update') }}")
            let id = $(this).attr('id')
            $.ajax({
                type: "post",
                url: "{{ route('penghasilan.edit') }}",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                    $('#id').val(response.id)
                    $('#nama').val(response.nama)
                    $('#btn-tambah').click()
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        })


        $(document).on('click', '.hapus', function() {
            let id = $(this).attr('id')
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('penghasilan.hapus') }}",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response, status) {
                            if (status = '200') {
                                setTimeout(() => {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Data Berhasil Di Hapus',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then((response) => {
                                        $('#table').DataTable().ajax.reload()
                                    })
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Gagal Menghapus!',
                            })
                        }
                    });
                }
            })
        })
    </script>
@endpush
