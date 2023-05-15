<h2>Data Pendaftaran</h2>
@include('afirmasi.btn_header')
<div class="table-responsive text-nowrap" id="cetak">
    <p class="text-info">Dibawah ini adalah data PPDB {{ $sekolah->nama }} Jalur Afirmasi</p>
    <table class="table table-hover" id="myTableAfirmasi">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>NISN</th>
                <th>Status</th>
                <th>Status Zonasi</th>
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
                        {{-- @foreach ($zonasiSekolah as $zone)
                            @if ($zonasiSekolah->first()->kampung_id == $item->siswa->kampung_id)
                            @if ($zone->kampung_id == $item->siswa->kampung_id)
                                DALAM ZONASI
                            @endif
                            @if ($zone->kampung_id != $item->siswa->kampung_id)
                                LUAR ZONASI
                            @endif
                        @endforeach --}}
                        @switch($item->siswa->kampung_id)
                            @case($zonasiSekolah->first()->kampung_id)
                                DALAM ZONASI
                            @break

                            @default
                                @php
                                    $luarZonasi = true;
                                @endphp
                                @foreach ($zonasiSekolah as $zone)
                                    @if ($zone->kampung_id == $item->siswa->kampung_id)
                                        @php
                                            $luarZonasi = false;
                                        @endphp
                                        DALAM ZONASI
                                    @break
                                @endif
                            @endforeach
                            @if ($luarZonasi == true)
                                LUAR ZONASI
                            @endif
                        @break

                    @endswitch
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
        $('#myTableAfirmasi').DataTable();
    });
</script>
@endpush
