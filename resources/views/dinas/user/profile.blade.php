@extends('layouts.main')

@section('content')
    <h4 class="fw-bold py-3 mb-4">Profil Anda</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Detail Profil Anda</h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Nama</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ $admin->name }}" autofocus disabled />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ $admin->email }}" placeholder="john.doe@example.com" disabled />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="nohp" class="form-label">No Handphone</label>
                                <input class="form-control" type="text" id="nohp" name="nohp"
                                    value="{{ $admin->nohp ?? '' }}" placeholder="Ex : 08xxxxxx" disabled />
                            </div>

                        </div>
                        <div class="mt-2">
                            @if ($admin->akses == 'Admin Dinas')
                                <a href="{{ route('user.edit', $admin->id) }}" class="btn btn-primary me-2">Edit Profile</a>
                            @elseif ($admin->akses == 'Admin Sekolah')
                                <a href="{{ route('user-sekolah.edit', $admin->id) }}" class="btn btn-primary me-2">Edit
                                    Profile</a>
                            @else
                                <a href="{{ route('usersiswa.edit', $admin->id) }}" class="btn btn-primary me-2">Edit
                                    Profile</a>
                            @endif

                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
