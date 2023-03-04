<div class="card-body">
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Ibu</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="basic-default-name"
                name="nama_ibu" placeholder="Inputkan Nama Orang Tua" value="{{ old('nama_ibu') }}">

            @error('nama_ibu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-company">Pekerjaan</label>
        <div class="col-sm-10">
            <select name="pekerjaan_ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror">
                <option value="">-- Pilih Pekerjaan --</option>
                @foreach ($pekerjaan as $item)
                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                @endforeach
            </select>

            @error('pekerjaan_ibu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-phone">Penghasilan / Bulan</label>
        <div class="col-sm-10">
            <select name="penghasilan_ibu" class="form-control @error('penghasilan_ibu') is-invalid @enderror">
                <option value="">-- Pilih Penghasilan --</option>
                @foreach ($penghasilan as $item)
                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            @error('penghasilan_ibu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>
</div>
