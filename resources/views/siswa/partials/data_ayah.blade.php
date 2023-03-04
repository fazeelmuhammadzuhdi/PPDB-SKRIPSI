<div class="card-body">
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Ayah</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="basic-default-name"
                name="nama_ayah" placeholder="John Doe" value="{{ old('nama_ayah') }}">
        </div>
        @error('nama_ayah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-company">Pekerjaan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                id="basic-default-company" name="pekerjaan_ayah" placeholder="ACME Inc.">
        </div>
        @error('pekerjaan_ayah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-phone">Penghasilan / Bulan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('penghasilan_ayah') is-invalid @enderror"
                id="basic-default-company" name="penghasilan_ayah" placeholder="ACME Inc.">
        </div>
        @error('penghasilan_ayah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
