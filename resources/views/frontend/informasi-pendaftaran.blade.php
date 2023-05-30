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
    <title>Informasi | PPDB</title>
</head>

<body>
    <!-- navbar     -->
    {{-- <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/barbershop.png" alt="" width="150">
                Barberbshop
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="login.html" class="nav-link btn btn-custom pl-3 pr-3">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.html" class="nav-link btn btn-outline-custom pl-3 pr-3">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}
    <div class="py-2">
        <div class="container">
            <div class="row gx-5">
                <div class="col-md-12">
                    <h2>Jalur Pendaftaran PPDB Tahun Ajaran 2023/2024</h2>

                </div>

            </div>
        </div>
    </div>

    <!-- section -->
    <section class="hero container">
        <div class="mt-5">
            <div class="row">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <h1 class="font-weight-bold text-info">Zonasi</h1>
                    <ol>
                        <li>Jalur Zonasi diperuntukkan bagi calon peserta didik baru SMP yang
                            memprioritaskan jarak domisili terdekat ke sekolah tujuan berdasarkan alamat
                            pada kartu keluarga.</li>
                        <li>Daya tampung jalur zonasi SMP paling sedikit 55% (Lima Puluh Lima Persen) dari daya
                            Tampung Sekolah</li>
                        <li>Calon peserta didik baru SMP hanya memilih 1 (satu) sekolah</li>
                        <li>Jika Sudah Mendafar Di Salah Satu Jalur Pendaftaran Maka, Calon peserta didik baru SMP Tidak
                            Dapat Melakukan Pendaftaran PPDB melalui Jalur Afirmasi,
                            Prestasi dan Pindah Tugas Orang Tua Lagi. </li>
                    </ol>
                    <a href="{{ route('home') }}" class="btn btn-custom pr-4 pl-4 pt-2 pb-2 mt-2">Kembali</a>
                </div>
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="600">
                    <img src="{{ asset('images/zonasi1.png') }}" alt="" width="450">
                </div>
            </div>
        </div>
    </section>

    <section class="hero container">
        <div class="mt-5">
            <div class="row">
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="600">
                    <img src="{{ asset('images/prestasi.png') }}" alt="" width="450">
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <h1 class="font-weight-bold text-info">Prestasi</h1>
                    <p class="text-muted">PPDB melalui jalur prestasi sebagaimana dimaksud merupakan jalur yang
                        diperuntukkan bagi peserta
                        didik yang memiliki prestasi yang ditentukan berdasarkan:</p>
                    <ol>
                        <li>Rata - Rata Nilai Rapor pada 5 (lima) Semester Terakhir Dari
                            Sekolah Asal</li>
                        <li>Jalur Prestasi Hasil Lomba Akademik dan</li>
                        <li>Jalur Prestasi Hasil Lomba Non Akademik.</li>
                        <li>Seleksi Nilai Rapor diperuntukkan bagi calon peserta didik baru SMP yang sistem penilaiannya
                            merupakan Total Nilai Rata-Rata Rapor SD 5 (lima) Semester Terakhir</li>
                        <li>Daya tampung jalur zonasi SMP paling sedikit 20% (Dua Puluh Persen) dari daya
                            Tampung Sekolah</li>
                    </ol>
                    <a href="{{ route('home') }}" class="btn btn-custom pr-4 pl-4 pt-2 pb-2 mt-2">Kembali</a>
                </div>

            </div>
        </div>
    </section>


    <section class="hero container">
        <div class="mt-5">
            <div class="row">

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <h1 class="font-weight-bold text-info">Afirmasi</h1>
                    <p class="text-muted">
                    </p>
                    <ol type="1">
                        <li>Jalur Afirmasi adalah jalur yang diperuntukkan bagi calon peserta didik baru:</li>
                        <ol type="a">
                            <li>Berasal dari keluarga ekonomi tidak mampu</li>
                            <li>Penyandang Disabilitas</li>
                        </ol>
                        <li>Peserta didik baru yang berasal dari keluarga ekonomi tidak mampu sebagaimana dimaksud
                            menyertakan :</li>
                        <ol type="a">
                            <li>Bukti keikutsertaan peserta didik dalam program penanganan keluarga tidak mampu dari
                                Pemerintah Pusat atau Pemerintah Daerah Dan</li>
                            <li>Bukti keikusertaan program penanganan keluarga tidak mampu dan/atau Kartu Indonesia
                                Pintar (KIP)</li>
                            <li> Kartu Indonesia Sehat (KIS)</li>
                            <li> Kartu Keluarga Sejahtera (KKS)</li>
                            <li> Program Keluarga Harapan (PKH)</li>
                        </ol>
                        <li>Surat pernyataan dari orang tua/wali peserta didik yang menyatakan bersedia diproses
                            secara hukum jika terbukti memalsukan bukti keikutsertaan dalam program penanganan
                            keluarga tidak mampu.</li>
                        <li>Pemalsuan bukti keikutsertaan peserta didik dalam program penanganan keluarga tidak
                            mampu akan dikenai sanksi hukum sesuai dengan ketentuan peraturan perundang-undangan
                        </li>
                        <li>Kuota jalur/seleksi afirmasi sebesar 15% (Lima Belas persen) dari daya tampung sekolah
                        </li>


                    </ol>
                    <a href="{{ route('home') }}" class="btn btn-custom pr-4 pl-4 pt-2 pb-2 mt-2">Kembali</a>
                </div>
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="600">
                    <img src="{{ asset('images/afirmasi.png') }}" alt="" width="550">
                </div>
            </div>
        </div>
    </section>

    <section class="hero container">
        <div class="mt-5">
            <div class="row">
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="600">
                    <img src="{{ asset('images/pindahtugas.png') }}" alt="" width="500">
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <h1 class="font-weight-bold text-info">Perpindahan Tugas Orang Tua / Wali</h1>
                    <p class="text-muted">
                    </p>
                    <ol type="1">
                        <li>Seleksi/jalur Pindah Tugas Orang Tua/Wali diperuntukkan bagi calon peserta didik baru yang
                            mengikuti perpindahan tugas orang tua/wali dibuktikan dengan</li>
                        <ol type="a">
                            <li>Surat penugasan dari instansi, lembaga, kantor, dan/atau perusahaan yang mempekerjakan
                            </li>
                            <li>Surat Keterangan Domisili</li>
                        </ol>
                        <li>Seleksi/jalur Perpindahan Tugas Orang Tua/wali diperuntukkan bagi calon peserta didik baru
                            SMK/SMA, terdiri dari Pindah Tugas Orang Tua/Wali, Anak Guru/Tenaga Kependidikan</li>

                        <li>Kuota seleksi/jalur Perpindahan Tugas Orang Tua/Wali paling banyak 5% (lima persen) dari
                            daya tampung sekolah</li>

                    </ol>
                    <a href="{{ route('home') }}" class="btn btn-custom pr-4 pl-4 pt-2 pb-2 mt-2">Kembali</a>
                </div>

            </div>
        </div>
    </section>


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
                                class="text-muted text-decoration-none"
                                target="_blank">{{ settings('app_email') }}</a>
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
