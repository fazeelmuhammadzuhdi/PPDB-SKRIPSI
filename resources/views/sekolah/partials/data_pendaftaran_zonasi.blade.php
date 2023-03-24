{{-- <div class="row justify-content-center">
    <div class="col-md-12 mt-lg-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Jalur Pendaftaran Prestasi</h3> <small class="text-muted float-end">
            </div>
            <div class="card-body"> --}}
<h2>Data Pendaftaran</h2>
<p class="text-info">Dibawah ini adalah data PPDB {{ $sekolah->nama }}.</p>
<div class="table-responsive text-nowrap">
    <table class="table table-hover" id="myTableZonasi">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>NISN</th>
                <th>Rata2 Nilai Rapor</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->siswa->nama_lengkap }}</td>
                    <td>{{ $item->siswa->jenis_kelamin == 'P' ? 'Laki - Laki' : 'Perempuan' }}</td>
                    <td>{{ $item->siswa->nisn }}</td>
                    <td class="text-center">{{ $item->jumlah }}</td>
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
                        <a href="{{ route('data_pendaftaran_zonasi.show', encrypt($item->id)) }}"
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
