@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-primary" role="alert">

                {{-- <center>
                    <strong>Selamat Datang {{ ucwords(Auth::user()->name) }} Sebagai {{ Auth::user()->akses }}
                        {{ $sekolah->nama }} {{ Auth::user()->sekolah->nama ?? '' }}</strong>
                </center> --}}
            </div>

            @if (auth()->user()->akses == 'Admin Dinas')
                <ul class="box-info">
                    <li>
                        <i class='bx bxs-group'></i>
                        <span class="text">
                            <p>PENDAFTAR</p>
                            <h3>{{ $siswa }} Orang</h3>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-school'></i>
                        <span class="text">
                            <p>SEKOLAH</p>
                            <h3>{{ $sekolah }} Sekolah</h3>
                        </span>
                    </li>
                </ul>
            @else
                <ul class="box-info">
                    <li>
                        <i class='bx bxs-calendar-check'></i>
                        <span class="text">
                            <p>AFIRMASI</p>
                            <h3>{{ $afirmasi }} Pendaftar</h3>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-group'></i>
                        <span class="text">
                            <p>PINDAH TUGAS ORANG TUA</p>
                            <h3>{{ $pindahTugas }} Pendaftar</h3>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-dollar-circle'></i>
                        <span class="text">
                            <p>PRESTASI</p>
                            <h3>{{ $prestasi }} Pendaftar</h3>
                        </span>
                    </li>
                    <li>
                        <i class='bx bxs-dollar-circle'></i>
                        <span class="text">
                            <p>ZONASI</p>
                            <h3>{{ $prestasi }} Pendaftar</h3>
                        </span>
                    </li>
                </ul>
            @endif


            </h5>
        </div>
    </div>
@endsection

@push('after-style')
    <style>
        :root {
            --poppins: 'Poppins', sans-serif;
            --lato: 'Lato', sans-serif;

            --light: #F9F9F9;
            --blue: #3C91E6;
            --light-blue: #CFE8FF;
            --grey: #eee;
            --dark-grey: #AAAAAA;
            --dark: #342E37;
            --red: #DB504A;
            --yellow: #FFCE26;
            --light-yellow: #FFF2C6;
            --orange: #FD7238;
            --light-orange: #FFE0D3;
            --light-green: #D1F2EB;
            --green: #2ECC71;
        }

        .box-info {
            display: grid;
            grid-template-columns: repeat(2, minmax(240px, 1fr));
            grid-gap: 24px;
            margin-top: 36px;
        }

        .box-info li {
            padding: 24px;
            /* background: var(--light); */
            background: #fff;
            border-radius: 20px;
            display: flex;
            align-items: center;
            grid-gap: 24px;
        }

        .box-info li .bx {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            font-size: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box-info li:nth-child(1) .bx {
            background: var(--light-blue);
            color: var(--blue);
        }

        .box-info li:nth-child(2) .bx {
            background: var(--light-yellow);
            color: var(--yellow);
        }

        .box-info li:nth-child(3) .bx {
            background: var(--light-orange);
            color: var(--orange);
        }

        .box-info li:nth-child(4) .bx {
            background: var(--light-green);
            color: var(--green);
        }

        .box-info li .text h3 {
            font-size: 24px;
            font-weight: 600;
            color: var(--dark);
        }

        .box-info li .text p {
            color: var(--dark);
        }
    </style>
@endpush
