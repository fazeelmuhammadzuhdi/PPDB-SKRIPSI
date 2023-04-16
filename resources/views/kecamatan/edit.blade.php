<div class="modal fade" id="editKecamatan" tabindex="-1" role="dialog" aria-labelledby="editKecamatanLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKecamatanLabel">Edit Data Kecamatan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="dataKecamatan" class="needs-validation" novalidate="" method="POST">
                    @csrf
                    <div>
                        <input class="form-control" id="id" type="hidden" name="id">
                        <div class="col-md-12">
                            <label class="form-label" for="nama_kecamatan">Nama Jenis Kecamatan</label>
                            <input class="form-control" id="nama_kecamatan" type="text" name="nama_kecamatan"
                                required>
                            @error('nama_kecamatan')
                                <div class="valid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" id="update" type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
