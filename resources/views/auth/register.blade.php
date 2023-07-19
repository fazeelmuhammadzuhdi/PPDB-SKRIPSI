<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('components.style_admin')
    <title>Registrasi | PPDB</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="mx-auto mt-2">
                @include('components.pendaftaran_tutup')
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
                                    id="email" name="email" placeholder="Masukkan Email atau Username"
                                    value="{{ old('email') }}" required autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" aria-describedby="helpId" placeholder="Password"
                                    required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <input type="checkbox" id="showPasswordCheckbox" class="mr-2">
                                        <i data-feather="eye" id="checkboxIcon"></i>
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
                                        <input type="checkbox" id="showPasswordConfirmationCheckbox" class="mr-2">
                                        <i data-feather="eye" id="checkboxIconConfirmation"></i>
                                    </span>
                                </div>
                            </div>
                            @if ($tutupPendaftaran >= $sekarang)
                                <button class="btn btn-custom btn-block p-2 mt-3" disabled>Daftar</button>

                                <p class="text-center mt-3">
                                    Sudah punya akun ? <a href="{{ route('login') }}"
                                        class="text-decoration-none text-custom">Masuk</a>
                                </p>
                            @else
                                <h3 class="text-center text-danger mt-3">
                                    Pendaftaran telah ditutup.
                                </h3>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.script_register')
</body>

</html>

{{-- asset offline --}}
{{-- <script src="{{ asset('sneat/assets/js/jquery.js') }}"></script> --}}
{{-- <script src="{{ asset('sneat/assets/js/boostrap46.js') }}"></script>
    <script src="{{ asset('sneat/assets/js/icon.js') }}"></script> --}}
