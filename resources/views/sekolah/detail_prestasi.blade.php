@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0" style="color:#8e44ad">Data Nilai Rapor {{ $data_prestasi->siswa->nama_lengkap }}</h4>
                    <small class="text-muted float-end">

                </div>
                <form enctype="multipart/form-data" method="POST"
                    action="{{ route('data_pendaftaran_prestasi.update', $data_prestasi->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="k4sm2" class="form-label fw-bold">Kelas 4 Semester 2</label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->k4sm2 }}">
                            </div>

                            <div class="form-group col-4 mb-3 ">
                                <label for="k5sm1" class="form-label fw-bold">Kelas 5 Semester 1</label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->k5sm1 }}">
                            </div>


                            <div class="form-group col-4">
                                <label for="k5sm2" class="form-label fw-bold">Kelas 5 Semester 2</label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->k5sm2 }}">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-4">
                                <label for="k6sm1" class="form-label fw-bold">Kelas 6 Semester 1</label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->k6sm1 }}">
                            </div>
                            <div class="form-group col-4 mb-3">
                                <label for="k6sm2" class="form-label fw-bold">Kelas 6 Semester 2</label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->k6sm2 }}">
                            </div>


                            <div class="form-group col-4">
                                <label for="jumlah_sm" class="form-label fw-bold">Rata - Rata Nilai Rapor
                                    <small>*Pembulatan</small></label>
                                <input type="text" class="form-control-plaintext" value="{{ $data_prestasi->jumlah }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <hr style="border: 1px solid gray; margin-bottom: 10px;">
                        </div>

                        <a href="{{ route('data_pendaftaran_prestasi.index') }}" class="btn btn-primary mb-3">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali
                        </a>

                        <style>
                            #pdfCanvas2 {
                                display: none;
                            }
                        </style>

                        <a href="{{ Storage::url($data_prestasi->bukti_nilai_rapor) }}" class="btn mb-3"
                            style="background-color: #8e44ad; color: white; margin-bottom: 10px;" target="_blank"
                            onclick="viewPDF('{{ Storage::url($data_prestasi->bukti_nilai_rapor) }}');">
                            <i class="fa fa-file" aria-hidden="true"></i> View Bukti Nilai Rapor
                        </a>
                        {{-- <canvas id="pdfCanvas1"></canvas> --}}
                        <canvas id="pdfCanvas2"></canvas>

                        <h4 class="mb-3" style="color:#8e44ad">Data Penghargaan {{ $data_prestasi->siswa->nama_lengkap }}
                            (<small>{{ $data_prestasi->siswa->nisn }}</small>)
                        </h4>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Nama Penghargaan</th>
                                        <th>Tahun</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penghargaan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_penghargaan }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td>
                                                <a href="javascript:void(0)"
                                                    onclick="popupCenter({url: '{{ url('/images/prestasi/' . $item->file) }}', title: 'Sertifikat', w: 800, h: 600});">
                                                    Lihat Sertifikat
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            @if ($data_prestasi->status == null)
                                <button type="submit" class="btn btn-dark mx-1"
                                    onclick="return confirm('Apakah Kamu Yakin Ingin Mengupdate Status CPD Ini ?')">
                                    Diterima ✅
                                </button>

                                <a href="{{ route('updateStatusDitolakPrestasi', $data_prestasi->id) }}"
                                    class="btn btn-dark">
                                    Ditolak ❌
                                </a>
                            @endif
                        </div>

                    </div>

                    <!-- /.card-body -->
                </form>

            </div>
        </div>
    </div>
@endsection
@push('after-script')
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

@endpush
