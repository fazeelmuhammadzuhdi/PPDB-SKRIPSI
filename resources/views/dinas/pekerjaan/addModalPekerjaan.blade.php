<!-- Modal -->
<div class="modal fade" id="addModalKategori" tabindex="-1" aria-labelledby="addModalKategoriLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('pekerjaan.store') }}" method="POST" id="addFormKategori">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalKategoriLabel">Tambah Data Pekerjaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="addModalUserLabel">Pekerjaan</label>
                                <input type="text" class="form-control" name="name">
                                <span class="text-danger error-text name_error"></span>
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
