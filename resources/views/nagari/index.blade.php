@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Applications</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active">Nagari</li>
            </ol>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        Data Nagari
                    </h3>

                    <button class="btn btn-primary add" type="button"><i class="fa fa-circle-plus"></i> Add Nagari</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="myTableNagari">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Nagari</th>
                                    <th>Nama Kecamatan</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nagari as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_nagari }}</td>
                                        <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('nagari.delete', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a type="button" class="btn btn-outline-info edit"
                                                    data-bs-id="{{ $item->id }}"
                                                    style="background-color: rgb(255, 255, 0); color: #fff"><i
                                                        class="fa fa-edit"></i></a>
                                                <a type="submit" class="btn btn-outline-danger show_confirm"
                                                    style="background-color: rgba(255, 3, 3, 0.959); color: #fff">
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
    @include('nagari.add')
    @include('nagari.edit')
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#myTableNagari').DataTable();
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

            $('.add').on("click", function(e) {
                e.preventDefault()
                $.ajax({
                    url: "{{ route('nagari.add') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#option').empty();
                            $('#option').append(
                                '<option value="">-- Pilih Kecamatan --</option>');

                            $.each(data, function(i, value) {
                                $('select[name="kecamatan_id"]').append(
                                    '<option value= "' + value.id + '">' +
                                    value.nama_kecamatan + '</option>');
                            });
                            $('#addNagari').modal('show');
                        }
                    }
                });
            });

            $('#save').on("click", function(e) {
                e.preventDefault()
                $.ajax({
                    type: "POST",
                    data: $('#saveNagari').serialize(),
                    url: "{{ route('nagari.store') }}",
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

            $('.edit').on("click", function(e) {
                e.preventDefault();
                var id = $(this).attr('data-bs-id');
                $.ajax({
                    url: "/dinas/nagari/edit/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('#id').val(data['item'].id);
                        $('#nama_nagari').val(data['item'].nama_nagari);


                        $('#kecamatan_id').empty();

                        $.each(data['option'], function(i, value) {
                            $('select[name="kecamatan_id"]').append(
                                '<option value= "' + value.id + '">' +
                                value.nama_kecamatan + '</option>');
                            if (data['item'].kecamatan_id == value.id) {
                                $('#kecamatan_id').append('<option value="' + value
                                        .id + '" selected>' + value.nama_kecamatan +
                                        '</option>')
                                    .trigger('change');;
                            }
                        });
                        $('#editNagari').modal('show');
                    }
                });
            });

            $('#update').on("click", function(e) {
                e.preventDefault()
                var id = $("#id").val();
                $.ajax({
                    type: "PUT",
                    data: $('#dataNagari').serialize(),
                    url: "/dinas/nagari/update/" + id,
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
