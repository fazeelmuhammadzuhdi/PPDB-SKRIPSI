<div class="modal fade" id="addKecamatan" tabindex="-1" role="dialog" aria-labelledby="addKecamatanLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKecamatanLabel">Data Kecamatan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kecamatan.store') }}" class="needs-validation" novalidate="" method="POST">
                    @csrf
                    <div>
                        <div class="col-md-12">
                            <label class="form-label">Nama Kecamatan</label>
                            <input class="form-control" type="text" name="nama_kecamatan" required>
                            @error('nama_kecamatan')
                                <div class="valid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer mt-3 m-0">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
