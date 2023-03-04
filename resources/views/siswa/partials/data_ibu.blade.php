<div class="card-body">
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Ibu</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="basic-default-name"
                name="nama_ibu" placeholder="John Doe" value="{{ old('nama_ibu') }}">
        </div>
        @error('nama_ibu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-company">Pekerjaan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                id="basic-default-company" name="pekerjaan_ibu" placeholder="ACME Inc.">
        </div>
        @error('pekerjaan_ibu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-phone">Penghasilan / Bulan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('penghasilan_ibu') is-invalid @enderror"
                id="basic-default-company" name="penghasilan_ibu" placeholder="ACME Inc.">
        </div>
        @error('penghasilan_ibu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
