{{-- <div class="row justify-content-center">
    <div class="col-md-12 mt-lg-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Jalur Pendaftaran Prestasi</h3> <small class="text-muted float-end">
            </div>
            <div class="card-body"> --}}
<h2>Data Pendaftaran</h2>
<div class="d-flex justify-content-end">
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
<p class="text-info">Dibawah ini adalah data PPDB {{ $sekolah->nama }}.</p>
<div class="table-responsive text-nowrap" id="cetak">
    <table class="table table-hover" id="myTableZonasi">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>NISN</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($afirmasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->siswa->nama_lengkap }}</td>
                    <td>{{ $item->siswa->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                    <td>{{ $item->siswa->nisn }}</td>
                    <td>
                        @if ($item->status == 1)
                            <span class="badge bg-success">Lulus</span>
                        @elseif ($item->status == 2)
                            <span class="badge bg-danger">Belum Lulus</span>
                        @else
                            <span class="badge bg-warning">Dalam Seleksi</span>
                        @endif
                    </td>
                    <td>
                        <img src="{{ Storage::url($item->siswa->foto) }}" alt="" width="30">
                    </td>
                    <td>
                        <a href="{{ route('data_pendaftaran_afirmasi.show', encrypt($item->id)) }}"
                            class="btn btn-info btn-sm mx-1">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



@push('after-script')
    <script>
        $(document).ready(function() {
            $('#myTableZonasi').DataTable();
        });
    </script>
@endpush
