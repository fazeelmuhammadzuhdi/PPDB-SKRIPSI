<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="shortcut icon" href="{{ asset('images/ppdblogo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('sneat/assets/css/style.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light bg-white shadow pt-2 pb-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/ppdblogo.png') }}" alt="" width="35%">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link me-3" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" href="#">Disabled</a>
                    </li>

                    <a class="btn btn-primary rounded-pill" href="{{ route('login') }}">Login</a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="about-text">
                        <small class="small-text">Website Resmi <span class="mobile-block">PPDB Online Kabupaten Pesisir
                                Selatan</span></small>
                        <h1 class="animated animated-text">
                            <span class="mr-2">PPDB ONLINE</span>
                            <div class="animated-info">
                                <span class="animated-item">KAB.PESSEL</span>
                            </div>
                        </h1>

                        <p>
                            Website ini dibangun Dalam rangka pelaksanaan Penerimaan Peserta Didik Baru (PPDB) secara
                            Online tahun ajaran 2023/2024 yang objektif, transparan dan akuntabel tingkat SMP
                            Daerah Kabupaten Pesisir Selatan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
