@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3> <small class="text-muted float-end">
                        <a href="{{ route($routePrefix . '.create') }}" class="btn btn-primary"> <i
                                class="fa fa-circle-plus"></i> Tambah Data</a></small>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        @if ($sekolah->isEmpty())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Pesan !</h6>
                                <p class="mb-0">Tidak Ada Data</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @else
                            <table class="table table-striped" id="myTableSekolah">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Operator</th>
                                        <th>Nama Sekolah</th>
                                        <th>NPSN</th>
                                        <th>Akreditasi</th>
                                        <th>Kecamatan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sekolah as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucwords($item->adminSekolah->name) }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->npsn }}</td>
                                            <td>{{ $item->akreditasi }}</td>
                                            <td>{{ $item->kecamatan }}</td>
                                            <td>
                                                <a href="{{ route($routePrefix . '.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <a href="{{ route($routePrefix . '.show', $item->id) }}"
                                                    class="btn btn-info btn-sm mx-1">
                                                    <i class="fas fa-eye"></i> Detail
                                                </a>

                                                <form action="{{ route($routePrefix . '.destroy', $item->id) }}"
                                                    method="POST" class="d-inline">
                                                    {{-- onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini')"> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger show_confirm btn-sm">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Data Tidak Ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script>
        $(document).ready(function() {
            $('#myTableSekolah').DataTable();
        });

        // $('.show_confirm').click(function(event) {
        //     var form = $(this).closest("form");
        //     var name = $(this).data("name");
        //     event.preventDefault();

        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             Swal.fire(
        //                 'Deleted!',
        //                 'Your file has been deleted.',
        //                 'success'
        //             )
        //         }
        //     })
        // });

        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Data Berhasil Di Hapus',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Data Tidak Jadi Di Hapus :)',
                        'error'
                    )
                }
            })
        });
    </script>
@endpush
