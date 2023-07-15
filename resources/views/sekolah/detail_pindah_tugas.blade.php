@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST"
                        action="{{ route('data_pendaftaran_pindah_tugas.update', $dataPindahTugas->id) }}">
                        @csrf
                        @method('PUT')
                        <table class="table table-sm mt-2">
                            <tr>
                                <td rowspan="9" width="100">
                                    <img src="{{ Storage::url($dataPindahTugas->siswa->foto ?? '') }}"
                                        alt="{{ $dataPindahTugas->siswa->nama_lengkap }}" width="100">
                                </td>
                            </tr>

                            <tr>
                                <td width="25%">Status Siswa</td>
                                <td>:
                                    <span>
                                        @if ($dataPindahTugas->status == 1)
                                            <span class="badge bg-success">Lulus</span>
                                        @elseif ($dataPindahTugas->status == 2)
                                            <span class="badge bg-danger">Tidak Lulus</span>
                                        @else
                                            <span class="badge bg-warning">Dalam Seleksi</span>
                                        @endif
                                    </span>
                                </td>

                            </tr>

                            <tr>
                                <td>Nama Siswa</td>
                                <td style="text-transform: uppercase">: {{ $dataPindahTugas->siswa->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>: {{ $dataPindahTugas->siswa->nisn }}</td>
                            </tr>
                            <tr>
                                <td>Asal Sekolah</td>
                                <td>: {{ $dataPindahTugas->siswa->sekolah_asal }}</td>
                            </tr>
                            <tr>
                                <td>Tempat / Tanggal Lahir</td>
                                <td>: {{ $dataPindahTugas->siswa->tempat_tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>: {{ $dataPindahTugas->siswa->agama }}</td>
                            </tr>
                        </table>
                        <div class="mt-3">
                            <a href="{{ route('data_pendaftaran_prestasi.index') }}" class="btn btn-primary">
                                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>

                            {{-- <a href="{{ Storage::url($dataPindahTugas->file) }}" class="btn btn-success" target="_blank">
                                <i class="fa fa-eye" aria-hidden="true"></i> View Bukti Surat Pindah</a> --}}

                            {{-- <a href="{{ Storage::url($dataPindahTugas->file) }}" class="btn btn-success" target="_blank"
                                onclick="viewPDF('{{ Storage::url($dataPindahTugas->file) }}');">
                                <i class="fa fa-eye" aria-hidden="true"></i> View Bukti Surat Pindah
                            </a>

                            <canvas id="pdfCanvas"></canvas> --}}


                            <a href="{{ Storage::url($dataPindahTugas->file) }}" class="btn btn-success" target="_blank"
                                onclick="viewPDF('{{ Storage::url($dataPindahTugas->file) }}');">
                                <i class="fa fa-eye" aria-hidden="true"></i> View Bukti Surat Pindah
                            </a>

                            {{-- <canvas id="pdfCanvas1"></canvas>
                            <canvas id="pdfCanvas2"></canvas> --}}

                            @if ($dataPindahTugas->status == null)
                                <button type="submit" class="btn btn-dark mx-1"
                                    onclick="return confirm('Apakah Kamu Yakin Ingin Mengupdate Status CPD Ini ?')">
                                    Diterima ✅
                                </button>

                                <a href="{{ route('updateStatusDitolakPindahtugas', $dataPindahTugas->id) }}"
                                    class="btn btn-dark"
                                    onclick="return confirm('Apakah kamu Yakin Ingin Mengupdate Status CPD Ini ?')">
                                    Ditolak ❌
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
        // Konfigurasi sumber kerja PDF.js
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';

        // Fungsi untuk menampilkan konten PDF
        function viewPDF(url) {
            // Muat dokumen PDF menggunakan PDF.js
            pdfjsLib.getDocument(url).promise.then(function(pdf) {
                // Ambil halaman pertama dari dokumen PDF
                pdf.getPage(1).then(function(page) {
                    var canvas = document.getElementById('pdfCanvas');
                    var context = canvas.getContext('2d');

                    var viewport = page.getViewport({
                        scale: 1
                    });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render halaman PDF ke elemen <canvas>
                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext);
                });
            });
        }
    </script>
@endpush
