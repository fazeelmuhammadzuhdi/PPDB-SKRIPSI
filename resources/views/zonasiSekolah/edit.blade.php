@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Edit Data Zonasi Sekolah</h3> <small class="text-muted float-end">
                </div>

                <form enctype="multipart/form-data" method="POST"
                    action="{{ route('zonasisekolah.update', $zonasiSekolah->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="kecamatan_id" class="form-label">Nama Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control select2">
                                    <option value="{{ $zonasiSekolah->id }}" selected>
                                        {{ $zonasiSekolah->kecamatan->nama_kecamatan }}
                                    </option>
                                    @foreach ($kecamatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                                @error('kecamatan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group mt-3">
                                <label for="kk" class="form-label">Nama Nagari</label>
                                <select name="nagari_id" id="nagari_id" class="form-control select2" required>
                                    <option value="{{ $zonasiSekolah->id }}" selected>
                                        {{ $zonasiSekolah->nagari?->nama_nagari }}
                                    </option>
                                </select>

                            </div>

                            <div class="form-group mt-3">
                                <label for="nama_kampung" class="form-label">Nama Kampung</label>
                                <select name="kampung_id" id="kampung_id" class="form-control select2" required>
                                    <option value="{{ $zonasiSekolah->id }}" selected>
                                        {{ $zonasiSekolah->kampung?->nama_kampung }}
                                    </option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-sharp fa-solid fa-clipboard-list me-1"></i>
                            Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('after-script')
    <script>
        $(function() {
            $('#kecamatan_id').on('change', function() {
                //mengambil id kecamatan_id
                let id_kecamatan = $('#kecamatan_id').val();
                let token = $("meta[name='csrf-token']").attr("content");
                // console.log(id_kecamatan_id);

                $.ajax({
                    type: "POST",
                    url: "{{ route('getnagarizonasi') }}",
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
                    url: "{{ route('getkampungzonasi') }}",
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
    </script>
@endpush
