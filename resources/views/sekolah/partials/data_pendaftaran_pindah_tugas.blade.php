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
                <th>Status</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pindahTugas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->siswa->nama_lengkap }}</td>
                    <td>{{ $item->siswa->jenis_kelamin == 'P' ? 'Laki - Laki' : 'Perempuan' }}</td>
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
                        <a href="{{ route('data_pendaftaran_pindah_tugas.show', encrypt($item->id)) }}"
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
