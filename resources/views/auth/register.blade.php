<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{ asset('images/iconppdb.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('sneat/assets/css/loginStyle.css') }}">
    <title>Registrasi | PPDB</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="mx-auto mt-2">
                {{-- <img src="{{ asset('images/ppdblogo.png') }}" alt="" width="200px"> --}}
                <center style="background-color: #fff; padding: 10px;"><b style="color:red;">PENDAFTARAN GRATIS,
                        HATI-HATI PENIPUAN</b><br> Pengumuman PPDB
                </center>
                <h3 align="center"
                    style="color:#8e44ad; text-shadow: 3px 2px 1px #fff; font-size: 20px; padding: 0px; margin-bottom: 0px;">
                    <b>PPDB ONLINE {{ now()->format('Y') }}</b> <br> Kabupaten Pesisir Selatan<br>
                </h3>

                <body onload="ajax()">
                    <div id="hasil" style="text-shadow: 3px 2px 1px #fff; font-size: 15px; margin-top: 10px">
                        <center>Pendaftaran PPDB Akan Di Tutup:<br> 16 hari 13 jam 22 menit 54 detik lagi</center>
                    </div>

                </body>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mt-3">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/sign-up.svg') }}" alt="" width="400px">
                </a>
            </div>

            <div class="col-md-5 mt-3">
                <div class="card shadow-sm p-3 border-radius-custom border-0">
                    <div class="card-body">
                        <h4>Registrasi</h4>
                        <p class="text-muted">Buat Akun</p>
                        <form action="{{ route('register') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <input id="name" type="text" placeholder="Masukkan Nama Lengkap"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Masukkan Email"
                                    value="{{ old('email') }}" required autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="" aria-describedby="helpId" placeholder="Password"
                                    required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i data-feather="eye"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="input-group mt-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password_confirmation" id="password-confirm" aria-describedby="helpId"
                                    placeholder="Password Confirmation" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i data-feather="eye"></i>
                                    </span>
                                </div>
                            </div>

                            <button class="btn btn-custom btn-block p-2 mt-3">Daftar</button>

                            <p class="text-center mt-3">
                                Sudah punya akun ? <a href="{{ route('login') }}"
                                    class="text-decoration-none text-custom">Masuk</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>
