@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Pendaftaran Melalui Zonasi</h3> <small class="text-muted float-end">
                </div>

                <form enctype="multipart/form-data" method="POST" action="{{ route('zonasi.store') }}" id="simpanDataZonasi">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="sekolah_id" class="form-label">Sekolah Tujuan</label>
                                <select name="sekolah_id"
                                    class="form-control select2 @error('sekolah_id') is-invalid @enderror " required>
                                    @error('sekolah_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <option value="">Pilih Sekolah</option>
                                    @foreach ($sekolah as $item)
                                        @foreach ($siswa as $data)
                                            @if ($item->kampung_id == $data->kampung_id)
                                                <option value="{{ $item->sekolah->id }}">{{ $item->sekolah->npsn }} |
                                                    {{ $item->sekolah->nama }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endforeach

                                    @error('sekolah_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </select>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary me-2" id="btnSimpan"><i
                                class="fa-sharp fa-solid fa-clipboard-list me-1"></i>
                            Daftar</button>

                        {{-- <button type="button" class="btn btn-dark"
                            onclick="window.location.href = '/siswa/jalur_pendaftaran'">
                            <i class="fa fa-backward me-1"></i> Kembali
                        </button> --}}
                        @include('components.button_kembali_siswa_jalur_pendaftaran')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        $(document).on('click', '#btnSimpan', function(e) {
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
                        data: $('#simpanDataZonasi').serialize(),
                        url: "{{ route('zonasi.store') }}",
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
                            $.each(errors, function(key, value) {
                                errorsHtml += '<li>' + value[0] + '</li>';
                            });
                            toastr.error(errorsHtml, 'Whoops!');
                        }
                    });
                }
            })
        });
    </script>
@endpush
