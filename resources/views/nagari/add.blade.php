<div class="modal fade" id="addNagari" aria-labelledby="addNagariLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNagariLabel">Add Jurusan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="saveNagari">
                    @csrf
                    <div>
                        <div class="col-md-12">
                            <label class="form-label">Nama Nagari</label>
                            <input class="form-control" type="text" name="nama_nagari" required>
                            @error('nama_nagari')
                                <div class="valid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label">Nama Kecamatan</label>
                            <select class="form-control" id="option" name="kecamatan_id" required></select>
                            @error('kecamatan_id')
                                <div class="valid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" id="save" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
