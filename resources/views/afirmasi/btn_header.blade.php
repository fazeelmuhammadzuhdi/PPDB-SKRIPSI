<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Data Pendaftaran</h2>
    <div>
        <a href="{{ route('data_pendaftaran_afirmasi.index') }}" class="btn btn-outline-dark btn-sm"><i
                class="fas fa-universal-access"></i>
            Siswa Lulus
        </a>
        <a href="{{ route('data_pendaftaran_afirmasi.create') }}" class="btn btn-outline-danger btn-sm mx-2"><i
                class="fas fa-universal-access"></i>
            Siswa Belum Lulus
        </a>

        <button class="btn btn-outline-primary btn-sm" onclick="printDiv('cetak')"><i class="fa fa-file-pdf"></i>
            Export PDF
        </button>
    </div>
</div>
