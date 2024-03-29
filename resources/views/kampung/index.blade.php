@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Applications</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active">Kampung</li>
            </ol>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        Data Kampung
                    </h3>

                    <a href="{{ route('kampung.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add
                        Kampung</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="myTableKampung">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Kampung</th>
                                    <th>Nama Nagari</th>
                                    <th>Nama Kecamatan</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kampung as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kampung }}</td>
                                        <td>{{ $item->nagari->nama_nagari }}</td>
                                        <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('kampung.destroy', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('kampung.edit', $item->id) }}" class="btn btn-warning"><i
                                                        class="bx bx-edit-alt"></i></a>

                                                <button type="submit" class="btn btn-danger show_confirm"><i
                                                        class="bx bxs-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-script')
    <script>
        $(document).ready(function() {
            $('#myTableKampung').DataTable();
        });
    </script>
    <script type="text/javascript">
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
                title: 'Apakah Anda Yakin?',
                text: "Kamu Ingin Menghapus Data Anggota Ini?",
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
                        'Data Berhasil Di Hapus.',
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
