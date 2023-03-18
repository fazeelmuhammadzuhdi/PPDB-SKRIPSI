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
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>NISN</th>
                <th>Rata2 Nilai Rapor</th>
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
                        <img src="{{ Storage::url($item->siswa->foto) }}" alt="" width="30">
                    </td>
                    <td>
                        <a href="{{ route('data_pendaftaran_prestasi.show', $item->id) }}"
                            class="btn btn-info btn-sm mx-1">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- </div>
        </div>
    </div>
</div> --}}


@push('after-script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush
