@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        @if ($dataCPD->isEmpty())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Pesan !</h6>
                                <p class="mb-0">Tidak Ada Data</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @else
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pendaftaran</th>
                                        <th>Nama Lengkap</th>
                                        <th>NISN</th>
                                        <th>TTL</th>
                                        <th>Sekolah Asal</th>
                                        <th>Kecamatan</th>
                                        <th>Nagari</th>
                                        <th>Kampung</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dataCPD as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucwords($item->no_pendaftaran) }}</td>
                                            <td>{{ ucwords($item->nama_lengkap) }}</td>
                                            <td>{{ ucwords($item->nisn) }}</td>
                                            <td>{{ ucwords($item->getTempatTanggalLahirAttribute()) }}</td>
                                            <td>{{ ucwords($item->sekolah_asal) }}</td>
                                            <td>{{ $item->kecamatan?->nama_kecamatan }}</td>
                                            <td>{{ $item->nagari?->nama_nagari }}</td>
                                            <td>{{ $item->kampung?->nama_kampung }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Data Tidak Ada</td>
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
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
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        });
    </script>
@endpush
