@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0" style="color:#8e44ad">Data Afirmasi {{ $data_afirmasi->siswa->nama_lengkap }}
                        ({{ $data_afirmasi->siswa->nisn }})</h4>
                    <small class="text-muted float-end">

                </div>

                <form enctype="multipart/form-data" method="POST"
                    action="{{ route('data_pendaftaran_afirmasi.update', $data_afirmasi->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="table-responsive text-nowrap text-center">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>KK</th>
                                    <th>Surat Keterangan Lulus</th>
                                    <th>KIP</th>
                                    <th>Surat Keterangan Tidak Mampu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                <td>{{ $no++ }}</td>
                                <td>
                                    <a href="javascript:void(0)"
                                        onclick="popupCenter({url: '{{ Storage::url($data_afirmasi->kk) }}', title: 'Sertifikat', w: 800, h: 600});">
                                        Lihat KK
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)"
                                        onclick="popupCenter({url: '{{ Storage::url($data_afirmasi->skl) }}', title: 'Sertifikat', w: 800, h: 600});">
                                        Lihat SKL
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)"
                                        onclick="popupCenter({url: '{{ Storage::url($data_afirmasi->kip) }}', title: 'Sertifikat', w: 800, h: 600});">
                                        Lihat KIP
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)"
                                        onclick="popupCenter({url: '{{ Storage::url($data_afirmasi->sktm) }}', title: 'Sertifikat', w: 800, h: 600});">
                                        Lihat SKTM
                                    </a>
                                </td>
                                <td>

                                </td>
                            </tbody>
                        </table>
                    </div>


                    <div class="card-footer">
                        <a href="{{ route('data_pendaftaran_prestasi.index') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>

                        @if ($data_afirmasi->status == null)
                            <button type="submit" class="btn btn-dark mx-1">
                                Diterima ✅
                            </button>

                            <a href="{{ route('updateStatusDitolak', $data_afirmasi->id) }}" class="btn btn-dark">
                                Ditolak ❌
                            </a>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
