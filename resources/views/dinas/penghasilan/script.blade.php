<script>
    $(document).ready(function() {
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
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
                    orderable: false,
                    searchable: false,
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
                // $("#nama").focus();
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
                                    $('#nama').val('');
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
