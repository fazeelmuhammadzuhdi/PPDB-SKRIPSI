<div class="row">
    <div class="col-5">
        <div class="card mb-4">
            <div class="card-body">
                @if (Request::routeIs('siswa.edit'))
                    <label for="nama_lengkap">Foto<span class="text-danger">*</span></label>
                    <input type="file" name="foto" id="foto" accept="image/*"
                        class="form-control @error('foto') 'is-invalid' @enderror">
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mt-4">
                        <div class="fw-bold">Drop files here or click to upload.</div>
                        <div>
                            This is just a demo dropzone. Selected files are <span class="fw-bold">not</span>
                            actually uploaded.
                        </div>
                    </div>

                    <label for="kk" class="form-label mt-4">Kartu Keluarga <span
                            class="text-danger">*</span></label>
                    <input type="file" name="kk" id="kk" accept="image/*"
                        class="form-control @error('kk') 'is-invalid' @enderror">
                    @error('kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mt-4">
                        <div class="fw-bold">Drop files here or click to upload.</div>
                        <div>
                            This is just a demo dropzone. Selected files are <span class="fw-bold">not</span>
                            actually uploaded.
                        </div>
                    </div>
                @else
                    <label for="foto" class="form-label">Upload Foto</label>
                    <input type="file" name="foto" accept="image/*" id="foto"
                        class="form-control @error('foto') 'is-invalid' @enderror" required>
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- <div class="mt-4">
                        <div class="fw-bold">Drop files here or click to upload.</div>
                    </div> --}}

                    <label for="kk" class="form-label mt-4">Upload Kartu Keluarga</label>
                    <input type="file" name="kk" accept="image/*" id="kk"
                        class="form-control @error('kk') 'is-invalid' @enderror" required>
                    @error('kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mt-4">
                        <div class="fw-bold">Drop files here or click to upload.</div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-7">
        <div class="card mb-2">
            <div class="card-body">
                <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama_lengkap"
                    class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap"
                    placeholder="Inputkan Nama" autocomplete="off"
                    value="{{ old('nama_lengkap', $siswa->nama_lengkap ?? '') }}">

                @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <input type="hidden" name="no_pendaftaran"
                    class="form-control @error('no_pendaftaran') is-invalid @enderror" id="no_pendaftaran"
                    placeholder="Inputkan Nama" autocomplete="off" value="{{ $noPendaftaran }}">

                <div class="mt-3">
                    <label for="nisn" class="form-label">NISN *</label>
                    <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror"
                        id="nisn" placeholder="Inputkan NISN" minlength="10" maxlength="10" autocomplete="off"
                        value="{{ old('nisn', $siswa->nisn ?? '') }}" onkeypress="return inputAngka(event)">

                    @error('nisn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir *</label>
                    <input type="text" name="tempat_lahir"
                        class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                        placeholder="Inputkan Tempat Lahir" autocomplete="off"
                        value="{{ old('tempat_lahir', $siswa->tempat_lahir ?? '') }}">

                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                @if (Request::routeIs('siswa.edit'))
                    <div class="mt-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir *</label>
                        <input type="date" name="tanggal_lahir"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                            placeholder="Inputkan Tanggal Lahir" autocomplete="off"
                            value="{{ old('tanggal_lahir', $siswa->tanggal_lahir->format('Y-m-d') ?? '') }}">

                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @else
                    <div class="mt-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir *</label>
                        <input type="date" name="tanggal_lahir"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                            placeholder="Inputkan Tanggal Lahir" autocomplete="off"
                            value="{{ old('tanggal_lahir', $siswa->tanggal_lahir ?? '') }}">

                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endif

                <div class="mt-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                        <option value="L"
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki -
                            Laki
                        </option>
                        <option value="P"
                            {{ old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>

                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror">
                        <option value="" selected disabled>-- Pilih Agama --</option>
                        <option value="Islam" {{ old('agama', $siswa->agama ?? '') == 'Islam' ? 'selected' : '' }}>
                            Islam</option>
                        <option value="Khatolik"
                            {{ old('agama', $siswa->agama ?? '') == 'Khatolik' ? 'selected' : '' }}> Khatolik
                        </option>
                        <option value="Budha" {{ old('agama', $siswa->agama ?? '') == 'Budha' ? 'selected' : '' }}>
                            Budha
                        </option>
                        <option value="Hindu" {{ old('agama', $siswa->agama ?? '') == 'Hindu' ? 'selected' : '' }}>
                            Hindu
                        </option>
                        <option value="Protestan"
                            {{ old('agama', $siswa->agama ?? '') == 'Protestan' ? 'selected' : '' }}> Protestan
                        </option>
                    </select>

                    @error('agama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="sekolah_asal" class="form-label">Sekolah Asal *</label>
                    <input type="text" name="sekolah_asal"
                        class="form-control @error('sekolah_asal') is-invalid @enderror" id="sekolah_asal"
                        placeholder="Inputkan Sekolah Asal" autocomplete="off"
                        value="{{ old('sekolah_asal', $siswa->sekolah_asal ?? '') }}">

                    @error('sekolah_asal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="no_kk" class="form-label">No Kartu Keluarga *</label>
                    <input type="text" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror"
                        id="no_kk" placeholder="Inputkan No KK" minlength="16" maxlength="16"
                        onkeypress="return inputAngka(event)" autocomplete="off"
                        value="{{ old('no_kk', $siswa->no_kk ?? '') }}">

                    @error('no_kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="nik" class="form-label">No Induk Keluarga *</label>
                    <input type="text" name="no_nik" class="form-control @error('no_nik') is-invalid @enderror"
                        id="no_nik" placeholder="Inputkan No NIK" minlength="16" maxlength="16"
                        onkeypress="return inputAngka(event)" autocomplete="off"
                        value="{{ old('no_nik', $siswa->no_nik ?? '') }}">

                    @error('no_nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


            </div>
        </div>
    </div>
</div>
