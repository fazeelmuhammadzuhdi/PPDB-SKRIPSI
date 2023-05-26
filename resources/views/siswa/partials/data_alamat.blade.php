{{-- <div class="card-body">
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Ayah</label>
        <div class="col-sm-10">
            <label for="kecamatan_id" class="form-label">Nama Kecamatan</label>
            <select name="kecamatan_id" id="kecamatan_id" class="form-control select2" required>
                <option value="">--Pilih Kecamatan--</option>
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

    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-company">Pekerjaan</label>
        <div class="col-sm-10">
            <select name="nagari_id" id="nagari_id" class="form-control select2" required>

            </select>
        </div>

    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-phone">Penghasilan / Bulan</label>
        <div class="col-sm-10">
            <label for="nama_kampung" class="form-label">Nama Kampung</label>
            <select name="kampung_id" id="kampung_id" class="form-control select2" required>

            </select>

        </div>

    </div>
</div> --}}


@if (Request::routeIs('siswa.edit'))
    <div class="card-body">
        <div class="row">
            <div class="form-group">
                <label for="alamat">Alamat Rumah <span class="text-danger">(Sesuai Dengan Kartu Keluarga )
                        *</span></label>
                <textarea name="alamat" id="editor" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $siswa->alamat ?? '') }}
                    </textarea>

                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="kecamatan_id" class="form-label">Nama Kecamatan</label>
                <select name="kecamatan_id" id="kecamatan_id" class="form-control" required>
                    <option value="{{ $siswa->id }}" selected>{{ $siswa->kecamatan?->nama_kecamatan }}
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
                <select name="nagari_id" id="nagari_id" class="form-control" required>
                    <option value="{{ $siswa->id }}" selected>{{ $siswa->nagari?->nama_nagari }}
                </select>

            </div>

            <div class="form-group mt-3">
                <label for="nama_kampung" class="form-label">Nama Kampung</label>
                <select name="kampung_id" id="kampung_id" class="form-control" required>
                    <option value="{{ $siswa->id }}" selected>{{ $siswa->kampung?->nama_kampung }}
                </select>
            </div>


        </div>
    </div>
@else
    <div class="card-body">
        <div class="row">
            <div class="form-group">
                <label for="alamat">Alamat Rumah *</label>
                <textarea name="alamat" id="editor" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $siswa->alamat ?? '') }}
                    </textarea>

                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="kecamatan_id" class="form-label">Nama Kecamatan</label>
                <select name="kecamatan_id" id="kecamatan_id" class="form-control" required>
                    <option value="">--Pilih Kecamatan--</option>
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
                <select name="nagari_id" id="nagari_id" class="form-control" required>

                </select>

            </div>

            <div class="form-group mt-3">
                <label for="nama_kampung" class="form-label">Nama Kampung</label>
                <select name="kampung_id" id="kampung_id" class="form-control" required>

                </select>

            </div>
        </div>
    </div>
@endif



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(function() {
        $('#kecamatan_id').on('change', function() {
            //mengambil id kecamatan_id
            let id_kecamatan = $('#kecamatan_id').val();
            let token = $("meta[name='csrf-token']").attr("content");
            // console.log(id_kecamatan_id);

            $.ajax({
                type: "POST",
                url: "{{ route('getnagarizonasiswa') }}",
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
                url: "{{ route('getkampungzonasiswa') }}",
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
