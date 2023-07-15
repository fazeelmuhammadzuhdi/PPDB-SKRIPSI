@extends('layouts.blank')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white p-5 r-5">

                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover "
                                    data-options='{
                                        "scrollY": true,
                                        "scrollX": true
                                    }'>

                                    @include('siswa.hasil_pengumuman_prestasi')
                                    @include('siswa.hasil_pengumuman_afirmasi')
                                    @include('siswa.hasil_pengumuman_pindah_tugas')
                                    @include('siswa.hasil_pengumuman_zonasi')


                                    {{-- <form action="{{ route('kartu_pendaftaran') }}" method="GET">
                                        @csrf
                                        <div class="form-group-inner input-with-success">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin:6%">
                                                    <div class="form-select-list">
                                                        <input type="hidden" name="cari" class="form-control"
                                                            placeholder="Cek Hasil .."
                                                            value="{{ $cek_siswa->no_pendaftaran }}">
                                                        <br>
                                                        <input type="submit" class="btn btn-primary bx bxs-file-pdf-o"
                                                            value="cetak">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form> --}}

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    window.print()
</script>
