@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Applications</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active">Kecamatan</li>
            </ol>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        Data Kecamatan
                    </h3>

                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test"
                        data-bs-target="#addKecamatan"><i class="fas fa-plus-circle"></i> Add
                        Kecamatan</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="myTableKecamatan">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Kecamatan</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kecamatan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kecamatan }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('kecamatan.hapus', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="btn btn-warning edit"
                                                    data-bs-id="{{ $item->id }}"><i class="fa fa-edit"></i></a>
                                                <a type="submit" class="btn btn-danger show_confirm">
                                                    <i class="fa fa-trash"></i></a>
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
    @include('kecamatan.add')
    @include('kecamatan.edit')
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#myTableKecamatan').DataTable();
        });
    </script>

    <script type="text/javascript">
        $('.show_confirm').click(function(e) {
            var form = $(this).closest("form");
            e.preventDefault();
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data Berhasil Di Hapus',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        form.submit();
                    } else {
                        swal("Your imaginary file is safe!", {
                            icon: "info"
                        });
                    }
                })
        });
    </script>

    <script>
        @if (session()->has('success'))
            toastr.success(
                '{{ session('success') }}',
                'Wohoooo!', {
                    showDuration: 300,
                    hideDuration: 900,
                    timeOut: 900,
                    closeButton: true,
                    newestOnTop: true,
                    progressBar: true,
                }
            );
        @elseif (session()->has('error'))
            toastr.error(
                '{{ session('error') }}',
                'Whoops!', {
                    showDuration: 300,
                    hideDuration: 900,
                    timeOut: 900,
                    closeButton: true,
                    newestOnTop: true,
                    progressBar: true,
                }
            );
        @endif
    </script>

    <script>
        $(document).ready(function() {
            $('.edit').on("click", function(e) {
                e.preventDefault()
                var id = $(this).attr('data-bs-id');
                $.ajax({
                    url: "/dinas/kecamatan/edit/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('#id').val(data.id);
                        $('#nama_kecamatan').val(data.nama_kecamatan);
                        $('#editKecamatan').modal('show');
                    }
                });
            });

            $('#update').on("click", function(e) {
                e.preventDefault()
                var id = $("#id").val();
                $.ajax({
                    type: "PUT",
                    data: $('#dataKecamatan').serialize(),
                    url: "/dinas/kecamatan/update/" + id,
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        toastr.success(
                            data.success,
                            'Wohoooo!', {
                                showDuration: 300,
                                hideDuration: 900,
                                timeOut: 900,
                                closeButton: true,
                                newestOnTop: true,
                                progressBar: true,
                                onHidden: function() {
                                    window.location.reload();
                                }
                            }
                        );
                    },
                    error: function(data) {
                        var errors = data.responseJSON.errors;
                        var errorsHtml = '';
                        $.each(errors, function(key, value) {
                            errorsHtml += '<li>' + value[0] + '</li>';
                        });
                        toastr.error(errorsHtml, 'Whoops!');
                    }
                });
            });
        });
    </script>
@endpush
