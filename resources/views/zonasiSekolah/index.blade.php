@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Applications</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active">Sekolah</li>
            </ol>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        Data Zonasi Sekolah
                    </h3>

                    <a href="{{ route('zonasisekolah.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                        Add Zonasi Sekolah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="myTableKampung">
                            <thead>
                                <tr>
                                    <th width="1%">Prioritas</th>
                                    <th>Kecamatan Zonasi</th>
                                    <th>Nagari Zonasi</th>
                                    <th>Kampung Zonasi</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($zonasiSekolah as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                                        <td>{{ $item->nagari->nama_nagari }}</td>
                                        <td>{{ $item->kampung?->nama_kampung }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('zonasisekolah.destroy', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('zonasisekolah.edit', $item->id) }}"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>

                                                <button type="submit" class="btn btn-danger show_confirm"><i
                                                        class="fa fa-trash"></i></button>
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
