<!-- Modal -->
<div class="modal fade" id="addModalDataZonasiSekolah" tabindex="-1" aria-labelledby="addModalDataZonasiSekolahLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('data_zonasi_sekolah.store') }}" method="POST" id="addFormDataZonasiSekolah">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalDataZonasiSekolahLabel">Tambah Data Zonasi Sekolah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="sekolah_id">Sekolah</label>
                                <select autocomplete="off" name="sekolah_id" id="sekolah_id" class="form-control"
                                    required>
                                    <option value="" selected disabled>--Pilih Sekolah--</option>
                                    @foreach ($sekolah as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('sekolah_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="kecamatan_id">Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control" required>
                                    <option value="">--Pilih Kecamatan--</option>
                                    @foreach ($dataKecamatan as $item)
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
                                <label for="nagari_id" class="form-label">Nama Nagari</label>
                                <select name="nagari_id" id="nagari_id" class="form-control">

                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="nama_kampung" class="form-label">Nama Kampung</label>
                                <select name="kampung_id" id="kampung_id" class="form-control">

                                </select>

                            </div>
                            <div class="form-group mt-3">
                                <label for="nama_kampung" class="form-label">Prioritas</label>
                                <input type="text" class="form-control" name="no_urut" id="no_urut"
                                    placeholder="Ex : 1" required>
                                @error('no_urut')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
