<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('data_pendaftaran_pindah_tugas.index') }}" class="btn btn-outline-dark btn-sm"><i
            class="fas fa-universal-access"></i>
        Siswa Lulus
    </a>
    <a href="{{ route('data_pendaftaran_pindah_tugas.create') }}" class="btn btn-outline-danger btn-sm mx-2"><i
            class="fas fa-universal-access"></i>
        Siswa Belum Lulus
    </a>
    <button class="btn btn-outline-primary btn-sm" onclick="printDiv('cetakSiswaPindahTugas')"><i class="fa fa-file-pdf"></i>
        Export PDF
    </button>
</div>
