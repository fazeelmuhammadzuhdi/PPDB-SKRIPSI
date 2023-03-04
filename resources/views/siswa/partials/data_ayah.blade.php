<div class="card-body">
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Ayah</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="basic-default-name"
                name="nama_ayah" placeholder="Inputkan Nama Orang Tua" value="{{ old('nama_ayah') }}">

            @error('nama_ayah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-company">Pekerjaan</label>
        <div class="col-sm-10">
            <select name="pekerjaan_ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror">
                <option value="">-- Pilih Pekerjaan --</option>
                @foreach ($pekerjaan as $item)
                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                @endforeach
            </select>

            @error('pekerjaan_ayah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-phone">Penghasilan / Bulan</label>
        <div class="col-sm-10">
            <select name="penghasilan_ayah" class="form-control @error('penghasilan_ayah') is-invalid @enderror">
                <option value="">-- Pilih Penghasilan --</option>
                @foreach ($penghasilan as $item)
                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            @error('penghasilan_ayah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>
</div>
