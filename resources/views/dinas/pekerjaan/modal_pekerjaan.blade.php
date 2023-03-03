   <div class="modal fade" id="modalPekerjaan" tabindex="-1" aria-hidden="true">
       <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel2">{{ $title }}</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <form action="{{ route('pekerjaan.store') }}" method="POST" id="forms">
                       @csrf
                       <div class="row">
                           <div class="col mb-3">
                               <label for="nama" class="form-label">Pekerjaan</label>
                               <input type="text" id="nama" name="nama" class="form-control"
                                   placeholder="Ex : PNS">
                               <input type="text" hidden class="form-control" name="id" id="id"
                                   placeholder="Inputkan Pekerjaan">
                           </div>
                       </div>
                       <div class="modal-footer justify-content-between m-0 p-0">
                           <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                               id="btn-tutup">Close</button>
                           <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
