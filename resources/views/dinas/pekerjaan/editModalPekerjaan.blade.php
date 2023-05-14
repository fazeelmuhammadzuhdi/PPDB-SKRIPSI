<!-- Modal -->
<div class="modal fade" id="editModalKategori" tabindex="-1" aria-labelledby="editModalKategoriLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('pekerjaan.update') }}" method="POST" id="editFormKategori">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalKategoriLabel">Edit Data Pekerjaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="idKategori" id="idKategori">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="editModalKategoriLabel">Pekerjaan</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <span class="text-danger error-text name_error_edit"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
