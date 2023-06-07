@include('zonasi.btn_header')

<div class="table-responsive text-nowrap" id="cetakSiswaZonasi">
    <p class="text-info">Dibawah ini adalah data PPDB {{ $sekolah->nama }} Jalur Zonasi</p>
    {{-- <button type="button" id="btn-status" class="btn btn-success mb-3">GANTI STATUS</button> --}}
    <button type="button" id="btn-status" class="btn btn-success mb-3" style="display: none;">GANTI STATUS</button>
    <table class="table table-hover" id="myTableZonasi">
        <thead>
            <tr>
                <th>No</th>
                <th><input type="checkbox" id="checked-all"></th>
                <th>Nama</th>
                {{-- <th>Jenis Kelamin</th> --}}
                <th>NISN</th>
                <th>Tanggal Pendaftaran</th>
                <th>Status</th>
                <th>Nilai</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- @php
                $no = 1;
            @endphp
            @foreach ($zonasi as $item)
                @foreach ($zonasiSekolah as $data)
                    @if ($item->sekolah_id == $data->sekolah_id && $item->siswa->kecamatan_id == $data->kecamatan_id && $item->siswa->nagari_id == $data->nagari_id && $item->siswa->kampung_id == $data->kampung_id)
                        <tr>
                            <td>{{ $no++ }}</td>
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
                            <td>{{ $data->nilai }}</td>

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
                    @break;
                @endif
            @endforeach
        @endforeach --}}

            {{-- @php
                $no = 1;
                $sortedZonasiSekolah = $zonasiSekolah->sortByDesc('nilai');
            @endphp

            @foreach ($zonasi as $item)
                @foreach ($sortedZonasiSekolah as $data)
                    @if ($item->sekolah_id == $data->sekolah_id && $item->siswa->kecamatan_id == $data->kecamatan_id && $item->siswa->nagari_id == $data->nagari_id && $item->siswa->kampung_id == $data->kampung_id)
                        <tr>
                            <td>{{ $no++ }}</td>
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
                            <td>{{ $data->nilai }}</td>

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
                    @break
                @endif
            @endforeach
        @endforeach --}}


            @php
                $no = 1;
                $sortedZonasiSekolah = $zonasiSekolah->where('sekolah_id', $sekolah->id)->sortByDesc('nilai');
            @endphp

            @foreach ($sortedZonasiSekolah as $data)
                @foreach ($zonasi as $item)
                    @if (
                        $item->sekolah_id == $data->sekolah_id &&
                            $item->siswa->kecamatan_id == $data->kecamatan_id &&
                            $item->siswa->nagari_id == $data->nagari_id &&
                            $item->siswa->kampung_id == $data->kampung_id)
                        <tr>
                            <td>{{ $no++ }}</td>
                            {{-- <td><input type="checkbox" name="checkbox[]" value="{{ $item->id }}"
                                    class="change-status"></td> --}}
                            <td><input type="checkbox" class="change-status" name="ids[]" value="{{ $item->id }}">
                            </td>
                            <td>{{ $item->siswa->nama_lengkap }}</td>
                            {{-- <td>{{ $item->siswa->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td> --}}
                            <td>{{ $item->siswa->nisn }}</td>
                            <td>
                                {{ $item->formattedDateTime }}
                            </td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge bg-success">Lulus</span>
                                @elseif ($item->status == 2)
                                    <span class="badge bg-danger">Belum Lulus</span>
                                @else
                                    <span class="badge bg-warning">Dalam Seleksi</span>
                                @endif
                            </td>
                            <td>{{ $data->nilai }}</td>

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
                    @endif
                @endforeach
            @endforeach


            {{-- @php
                $sortedZonasiSekolah = $zonasiSekolah->sortByDesc('nilai');
            @endphp
            @foreach ($zonasi as $item)
                @foreach ($sortedZonasiSekolah as $data)
                    @if ($item->sekolah_id == $data->sekolah_id && $item->siswa->kecamatan_id == $data->kecamatan_id && $item->siswa->nagari_id == $data->nagari_id && $item->siswa->kampung_id == $data->kampung_id)
                        <tr>
                            <td>{{ $no++ }}</td>
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
                            <td>{{ $data->nilai }}</td>

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
                    @break
                @endif
            @endforeach
        @endforeach --}}


        </tbody>
    </table>
</div>



@push('after-script')
    <script>
        $(document).ready(function() {
            $('#myTableZonasi').DataTable();
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            $('#btn-status').hide();
            $('.change-status').change(function() {
                if ($('.change-status:checked').length > 0) {
                    $('#btn-status').show();
                } else {
                    $('#btn-status').hide();
                }
            });

            $('#checked-all').click(function(e) {
                if ($(this).is(':checked')) {
                    $('#btn-status').show();
                    $(".change-status").prop('checked', true)
                } else {
                    $('#btn-status').hide();
                    $(".change-status").prop('checked', false)
                }
            });

            $('#btn-status').click(function() {
                var confirmation = confirm('Apakah Anda yakin ingin mengganti status?');
                if (confirmation) {
                    var selectedIds = [];
                    $('.change-status:checked').each(function() {
                        selectedIds.push($(this).val());
                    });

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "{{ route('updateStatusDitolak') }}",
                        data: {
                            ids: selectedIds
                        },
                        dataType: "json",
                        success: function(response) {
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#btn-status').hide();
            $('.change-status').change(function(e) {
                if ($(this).prop('checked')) {
                    $('#btn-status').show();
                }

                if ($(".change-status:checked").length == 0) {
                    $('#btn-status').hide();
                }
            });

            $('#checked-all').click(function(e) {
                if ($(this).is(':checked')) {
                    $('#btn-status').show();
                    $(".change-status").prop('checked', true)
                } else {
                    $('#btn-status').hide();
                    $(".change-status").prop('checked', false)
                }
            });

            $("#btn-status").click(function(e) {
                e.preventDefault();

                var selectedIds = [];

                $(".change-status:checked").each(function() {
                    selectedIds.push($(this).val());
                });

                if (selectedIds.length > 0) {
                    if (confirm("Apakah Anda yakin ingin mengubah status terpilih?")) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            url: "{{ route('updateStatusDitolak') }}",
                            data: {
                                ids: selectedIds
                            },
                            dataType: "json",

                            success: function(response) {
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                }
            });
        });
    </script>
@endpush
