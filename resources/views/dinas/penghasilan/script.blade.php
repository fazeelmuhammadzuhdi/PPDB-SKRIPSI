 <script>
     $(document).ready(function() {
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         fetchKategori()

         function fetchKategori() {
             let datatable = $('#tableKategori').DataTable({
                 processing: true,
                 info: true,
                 serverSide: true,

                 ajax: {
                     url: "{{ route('penghasilan.fetch') }}",
                     type: "get"
                 },
                 columns: [{
                         data: 'checkbox',
                         name: 'checkbox',
                         orderable: false,
                         searchable: false
                     },
                     {
                         data: 'DT_RowIndex',
                         name: 'DT_RowIndex'
                     },
                     {
                         data: 'nama',
                         name: 'nama'
                     },

                     {
                         data: 'action',
                         name: 'action',
                         orderable: false,
                         searchable: false
                     }
                 ]
             }).on('draw', function() {
                 $('input[name="user_checkbox"]').each(function() {
                     this.checked = false;
                 })

                 $('input[name="main_checkbox"]').prop('checked', false);
                 $('#deleteAll').addClass('d-none');
             });
         }

         //  Menyimpan Data Kategori
         $(document).on('submit', '#addFormKategori', function(e) {
             e.preventDefault();

             let dataForm = this;
             //  console.log(dataForm);
             $.ajax({
                 type: $('#addFormKategori').attr('method'),
                 url: $('#addFormKategori').attr('action'),
                 data: new FormData(dataForm),
                 dataType: "json",
                 processData: false,
                 contentType: false,
                 beforeSend: function() {
                     $('#addFormKategori').find('span.error-text').text('');
                 },
                 success: function(response) {
                     if (response.status == 400) {
                         $.each(response.error, function(prefix, val) {
                             $('#addFormKategori').find('span.' + prefix + '_error')
                                 .text(val[0]);
                         });
                     } else {
                         Swal.fire(
                             'Sukses',
                             response.success,
                             'success',
                         )
                         $('#addModalKategori').modal('hide');
                         $('#tableKategori').DataTable().ajax.reload(null, false);
                         $('#addFormKategori')[0].reset();
                     }
                 }
             });
         });

         //edit Data Kategori
         $(document).on('click', '#btnEditKategori', function(e) {
             e.preventDefault();

             let idKategori = $(this).data('id')
             //  alert(idKategori);

             $.get("{{ route('penghasilan.edit') }}", {
                     idKategori: idKategori
                 },
                 function(data) {
                     $('#editModalKategori').modal('show');
                     $('#idKategori').val(idKategori);
                     $('#name').val(data.jenisBuku.nama);
                 },
                 "json"
             );
         });


         //  Update Data Kategori
         $(document).on('submit', '#editFormKategori', function(e) {
             e.preventDefault();

             let dataForm = this;
             //  console.log(dataForm);
             $.ajax({
                 type: $('#editFormKategori').attr('method'),
                 url: $('#editFormKategori').attr('action'),
                 data: new FormData(dataForm),
                 dataType: "json",
                 processData: false,
                 contentType: false,
                 beforeSend: function() {
                     $('#editFormKategori').find('span.error-text').text('');
                 },
                 success: function(response) {
                     if (response.status == 400) {
                         $.each(response.error, function(prefix, val) {
                             $('#editFormKategori').find('span.' + prefix +
                                     '_error_edit')
                                 .text(val[0]);
                         });
                     } else {
                         Swal.fire(
                             'Sukses',
                             response.success,
                             'success',
                         )
                         $('#editModalKategori').modal('hide');
                         $('#tableKategori').DataTable().ajax.reload(null, false);
                         $('#editFormKategori')[0].reset();
                     }
                 }
             });
         });

         //Delete Data Kategori
         $(document).on('click', '#btnDeleteKategori', function(e) {
             e.preventDefault();

             let idKategori = $(this).data('id')
             //  console.log(idKategori);

             Swal.fire({
                 title: 'Apakah Kamu Yakin?',
                 text: "Kamu Ingin Menghapus Data Ini!",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, delete it!'
             }).then((result) => {
                 if (result.isConfirmed) {
                     $.post("{{ route('penghasilan.destroy') }}", {
                             idKategori: idKategori
                         },
                         function(data) {
                             if (data.status == 400) {
                                 Swal.fire(
                                     'Error',
                                     data.error,
                                     'error'
                                 )
                             } else {
                                 Swal.fire(
                                         'Sukses',
                                         data.success,
                                         'success',
                                     ),
                                     $('#tableKategori').DataTable().ajax.reload(null,
                                         false);
                             }
                         },
                         "json"
                     );
                 }
             })
         });

         function toggleDeleteAllBtn() {
             if ($('input[name="user_checkbox"]:checked').length > 0) {
                 $('#deleteAll').text('Hapus (' + $('input[name="user_checkbox"]:checked').length + ')')
                     .removeClass('d-none');
             } else {
                 $('#deleteAll').addClass('d-none');
             }
         }

         $(document).on('click', '#main_checkbox', function() {
             if (this.checked) {
                 $('input[name="user_checkbox"]').each(function() {
                     this.checked = true;
                 });
             } else {
                 $('input[name="user_checkbox"]').each(function() {
                     this.checked = false;
                 });
             }
             toggleDeleteAllBtn();
         });

         $(document).on('click', '#user_checkbox', function() {
             if ($('input[name="user_checkbox"]').length == $('input[name="user_checkbox"]:checked')
                 .length) {
                 $('#main_checkbox').prop('checked', true);
             } else {
                 $('#main_checkbox').prop('checked', false);
             }
             toggleDeleteAllBtn();
         });

         $(document).on('click', '#deleteAll', function(e) {
             e.preventDefault()

             let idKategoris = []

             $('input[name="user_checkbox"]:checked').each(function() {
                 idKategoris.push($(this).data('id'));
             });

             //  alert(idKategoris);
             if (idKategoris.length > 0) {
                 Swal.fire({
                     title: 'Apakah Kamu Yakin?',
                     html: "Kamu Ingin Menghapus <b>(" + idKategoris.length + ")</b> Data Ini",
                     icon: 'warning',
                     showCancelButton: true,
                     showCloseButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     cancelButtonText: 'Tidak',
                     confirmButtonText: 'Ya, Hapus!'
                 }).then((result) => {
                     if (result.isConfirmed) {
                         $.post("{{ route('penghasilan.destroySelected') }}", {
                                 idKategoris: idKategoris
                             },
                             function(data) {
                                 Swal.fire(
                                         'Sukses',
                                         data.success,
                                         'success',
                                     ),
                                     $('#tableKategori').DataTable().ajax.reload(null,
                                         false);
                             },
                             "json"
                         );
                     }
                 })
             }

         });
     });
 </script>
