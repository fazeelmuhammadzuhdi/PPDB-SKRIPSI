@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Applications</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active">Zonasi Sekolah</li>
            </ol>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        Data Zonasi Sekolah SMP Di Pesisir Selatan
                    </h3>

                    {{-- <a href="{{ route('data_zonasi_sekolah.create') }}" class="btn btn-primary"><i
                            class="fas fa-plus-circle"></i> Add
                        Zonasi Sekolah</a> --}}

                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test"
                        data-bs-target="#addModalDataZonasiSekolah"><i class="fas fa-plus-circle"></i> Add
                        Zonasi Sekolah</button>

                    <button class="btn btn-outline-primary" onclick="printDiv('cetakDataZonasiSekolah')"><i
                            class="fa fa-file-pdf"></i>
                        Export PDF
                    </button>

                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap" id="cetakDataZonasiSekolah">
                        <table class="table table-hover" id="myDataZonasiSekolah">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Sekolah</th>
                                    <th>NPSN Sekolah</th>
                                    <th>Kecamatan</th>
                                    <th>Nagari Zonasi</th>
                                    <th>Kampung Zonasi</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($sekolah as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->npsn }}</td>
                                        <td>
                                            @foreach ($kecamatan as $kec)
                                                @if ($kec->sekolah_id == $item->id)
                                                    {{ $kec->nama_kecamatan . ',' }}
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach ($nagari as $nag)
                                                @if ($nag->sekolah_id == $item->id)
                                                    {{ $nag->nama_nagari . ',' }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($kampung as $kam)
                                                @if ($kam->sekolah_id == $item->id)
                                                    {{ $kam->nama_kampung . ',' }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>

                                            <form method="POST"
                                                action="{{ route('data_zonasi_sekolah.destroy', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <a href="{{ route('data_zonasi_sekolah.show', $item->id) }}"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a> --}}

                                                <button type="submit" class="btn btn-danger show_confirm"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                                {{-- @foreach ($kecamatan as $item)
                                    @foreach ($item->zonasiSekolah as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->sekolah->nama }}</td>
                                            <td>{{ $data->sekolah->npsn }}</td>
                                            <td>{{ $item->nama_kecamatan }}</td>
                                            <td>
                                                @foreach ($nagari as $n)
                                                    @if ($n->id == $data->nagari_id)
                                                        {{ $n->nama_nagari }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($kampung as $k)
                                                    @if ($k->id == $data->kampung_id)
                                                        {{ $k->nama_kampung }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach --}}


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dataZonasiSekolah.addModalDataZonasiSekolah')
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

    <script>
        $(document).ready(function() {
            $('#myDataZonasiSekolah').DataTable();
        });




        $(function() {
            $('#kecamatan_id').on('change', function() {
                //mengambil id kecamatan_id
                let id_kecamatan = $('#kecamatan_id').val();
                let token = $("meta[name='csrf-token']").attr("content");
                // console.log(id_kecamatan_id);

                $.ajax({
                    type: "POST",
                    url: "{{ route('getdatazonasinagarisekolah') }}",
                    data: {
                        "id_kecamatan": id_kecamatan,
                        "_token": token
                    },
                    cache: false,
                    success: function(response) {
                        $('#nagari_id').html(response);
                        $('#kampung_id').html('');

                    },
                    error: function(xhr) {
                        console.log('Error :', xhr);
                    }
                });
            });

            $('#nagari_id').on('change', function() {
                //mengambil id kabupaten
                let id_nagari = $('#nagari_id').val();
                let token = $("meta[name='csrf-token']").attr("content");
                // console.log(id_kabupaten);

                $.ajax({
                    type: "POST",
                    url: "{{ route('getdatazonasikampungsekolah') }}",
                    data: {
                        "id_nagari": id_nagari,
                        "_token": token
                    },
                    cache: false,
                    success: function(response) {
                        $('#kampung_id').html(response);
                    },
                    error: function(xhr) {
                        console.log('Error :', xhr);
                    }
                });
            });

        })

        $(document).on('submit', 'form', function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                typeData: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    if (response.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.error,
                        });
                        $('#addModalDataZonasiSekolah').modal('hide');
                        window.location.reload();
                        // Reset isi setiap input dalam modal
                        $('#addModalDataZonasiSekolah').find('input, select').val('');
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.success,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        //tutup modal
                        $('#addModalDataZonasiSekolah').modal('hide');
                        window.location.reload();
                        // Reset isi setiap input dalam modal
                        $('#addModalDataZonasiSekolah').find('input, select').val('');
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan saat mengirim permintaan.',
                    });
                }
            });
        })
    </script>
@endpush
