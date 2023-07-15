<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Data Pendaftaran</h2>
    <div>
        <a href="{{ route('siswaLulusJalurPrestasi') }}" class="btn btn-outline-dark btn-sm"><i
                class="fas fa-universal-access"></i>
            Siswa Lulus
        </a>
        <a href="{{ route('data_pendaftaran_prestasi.create') }}" class="btn btn-outline-danger btn-sm mx-2"><i
                class="fas fa-universal-access"></i>
            Siswa Tidak Lulus
        </a>
        <button class="btn btn-outline-primary btn-sm" onclick="printDiv('cetakSiswaPrestasi')"><i
                class="bx bxs-file-pdf"></i>
            Export PDF
        </button>
    </div>
</div>
