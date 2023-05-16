@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="alert" role="alert" style="background-color:#83ae14b3; color:#000000;">
                <p class="mb-0"><b>Perhatian !</b> Seluruh Dokumen <b>Yang diunggah harus Asli</b> dan
                    dipindai / scan dengan jelas dan terbaca</p>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Pendaftaran Perpindahan Tugas Orang Tua</h3> <small class="text-muted float-end">
                </div>

                <form enctype="multipart/form-data" method="POST" action="{{ route('pindahtugas.store') }}"
                    id="simpanDataPindahTugas">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="sekolah_id" class="form-label">Sekolah Tujuan</label>
                                <select name="sekolah_id" class="form-control select2">
                                    <option value="">Pilih Sekolah</option>
                                    @foreach ($sekolah as $item)
                                        <option value="{{ $item->id }}">{{ $item->npsn }} | {{ $item->nama }}
                                        </option>
                                    @endforeach

                                    @error('sekolah_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </select>

                            </div>

                            <div class="form-group mt-3">
                                <label for="file" class="form-label">Surat Keterangan Pindah Tugas</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file" required>
                                <small class="text-danger">Format File Pdf Atau Gambar JPG, JPEG, PNG (Maksimal Ukuran 2
                                    Mb)</small>
                                @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="btnSimpanPindahTugas"><i
                                class="fa-sharp fa-solid fa-clipboard-list me-1"></i>
                            Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- @push('after-script')
    <script>
        $(document).on('click', '#btnSimpanPindahTugas', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Ingin Mendaftar Di Sekolah Ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya !'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        data: $('#simpanDataPindahTugas').serialize(),
                        url: "{{ route('pindahtugas.store') }}",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            toastr.success(
                                data.success,
                                'Wohoooo!', {
                                    showDuration: 1000,
                                    hideDuration: 1000,
                                    timeOut: 1000,
                                    closeButton: true,
                                    newestOnTop: true,
                                    progressBar: true,
                                    onHidden: function() {
                                        window.location.href =
                                            "{{ route('jalur_pendaftaran') }}"
                                    }
                                }
                            );
                        },
                        error: function(data) {
                            var errors = data.responseJSON.errors;
                            var errorsHtml = '';
                            toastr.error(errorsHtml, 'Whoops!');
                        }
                    });
                }
            })
        });
    </script>
@endpush --}}
