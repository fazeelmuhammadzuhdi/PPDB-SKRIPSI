<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{ asset('images/iconppdb.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('sneat/assets/css/loginStyle.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Jadwal | PPDB</title>
</head>

<body>
    <div class="py-2">
        <div class="container">
            <div class="row gx-5">
                <div class="col-md-12">
                    <h2>Jadwal Pendaftaran PPDB Tahun Ajaran {{ now()->format('Y') }} /
                        {{ now()->addYears(1)->format('Y') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2 inner-page">
        <div class="container mt-4">
            <h3><b>Jadwal Pelaksanaan PPDB</b></h3>
            <div class="row">
                <p>Adapun jadwal pelaksanaan PPDB Pesisir Selatan Tahun {{ now()->format('Y') }} adalah sebagai berikut
                    : </p>
                <table class="table table-hover table-bordered table-responsive">
                    <thead class="bg-primary" style="color: white;">
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th width="80%">Uraian Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1.</th>
                            <td>{{ \Carbon\Carbon::parse($awalPendaftaran)->format('d F Y') }}</td>
                            <td>Awal Pendaftaran PPDB </td>
                        </tr>
                        <tr>
                            <th>2.</th>
                            <td>{{ \Carbon\Carbon::parse($akhirPendaftaran)->format('d F Y') }}</td>
                            <td>Akhir Pendaftaran PPDB </td>
                        </tr>
                        {{-- <tr>
                            <th>4.</th>
                            <td>{{ \Carbon\Carbon::parse($awalPendaftaran)->format('d F Y') }} -
                                {{ \Carbon\Carbon::parse($akhirPendaftaran)->format('d F Y') }}</td>
                            <td>Seleksi PPDB </td>
                        </tr> --}}

                        <tr>
                            <th>5.</th>
                            <td>{{ \Carbon\Carbon::parse($pengumumanKelulusan)->format('d F Y') }}</td>
                            <td>Pengumuman Kelulusan PPDB</td>
                        </tr>

                        {{-- <tr>
                            <th style="background-color:grey"></th>
                            <td style="background-color:grey"></td>
                            <td style="background-color:grey"></td>
                        </tr>

                        <tr>
                            <th>6.</th>
                            <td>01 - 08 Juni 2023</td>
                            <td>Pendaftaran PPDB </td>
                        </tr>

                        <tr>
                            <th>7.</th>
                            <td>09 - 16 Juni 2023</td>
                            <td>Pendaftaran PPDB </td>
                        </tr>

                        <tr>
                            <th>8.</th>
                            <td>17 - 21 Juni 2023</td>
                            <td>Pendaftaran PPDB </td>
                        </tr>

                        <tr>
                            <th>9.</th>
                            <td>22 - 25 Juni 2023</td>
                            <td>Seleksi PPDB </td>
                        </tr>

                        <tr>
                            <th>10.</th>
                            <td>26 Juni 2023</td>
                            <td>Pengumuman PPDB </td>
                        </tr>

                        <tr>
                            <th style="background-color:grey"></th>
                            <td style="background-color:grey"></td>
                            <td style="background-color:grey"></td>
                        </tr>

                        <tr>
                            <th>11.</th>
                            <td>27 Juni - 03 Juli 2023</td>
                            <td>Pendaftaran ulang PPDB </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <section class="footer bg-theme pt-3 mt-5">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="300">
                <div class="col-md-6">
                    <img src="{{ asset('images/ppdblogo.png') }}" alt="" width="250" class="">
                    <p class="text-muted mb-4">
                        {!! settings('app_address') !!}
                    </p>
                </div>
                <div class="col-md-3 mb-3">
                    <h6 class="font-weight-bold">Bantuan</h6>
                    <ul class="list-group list-unstyled">
                        <li class="pb-2"><a href="https://disdikbud.pesisirselatankab.go.id/"
                                class="text-muted text-decoration-none" target="_blank">{{ settings('app_email') }}</a>
                        </li>
                        <li class="pb-2"><a href="#" class="text-muted text-decoration-none">Bantuan</a></li>
                        <li class="pb-2"><a href="#" class="text-muted text-decoration-none">Kebijakan
                                Privasi</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="font-weight-bold">Kontak</h6>
                    <p class="text-muted">
                        {{ settings('app_phone') }} <br> Kode Pos : 25611 <br>
                        Melalui : Telp/SMS/WA ke 085374704482 An.Gusmanelly
                    </p>
                </div>

                <div class="col-md-12">
                    <p class="text-center font-weight-bold">
                        &copy; {{ now()->format('Y') }} Fazeel Muhammad Zuhdi - SKRIPSI Aplikasi PPDB Online
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
        AOS.init();
    </script>

</body>

</html>
