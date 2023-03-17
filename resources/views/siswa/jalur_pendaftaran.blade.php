@extends('layouts.main')

@section('content')
    {{-- <div class="row g-4">
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="d-flex align-items-center justify-content-around my-4 py-2">
                        <h1 class="mb-1 card-title">ZONASI</h1>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="icon">
                            <i class='bx bx-move-horizontal'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="dropdown btn-pinned">
                        <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                        </ul>
                    </div>
                    <div class="mx-auto mb-3">
                        <img src="../../assets/img/avatars/12.png" alt="Avatar Image" class="rounded-circle w-px-100">
                    </div>
                    <h5 class="mb-1 card-title">Eugenia Parsons</h5>
                    <span>Developer</span>
                    <div class="d-flex align-items-center justify-content-center my-3 gap-2">
                        <a href="javascript:;" class="me-1"><span class="badge bg-label-danger">Angular</span></a>
                        <a href="javascript:;"><span class="badge bg-label-info">React</span></a>
                    </div>

                    <div class="d-flex align-items-center justify-content-around my-4 py-2">
                        <div>
                            <h4 class="mb-1">112</h4>
                            <span>Projects</span>
                        </div>
                        <div>
                            <h4 class="mb-1">23.1k</h4>
                            <span>Tasks</span>
                        </div>
                        <div>
                            <h4 class="mb-1">1.28k</h4>
                            <span>Connections</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="javascript:;" class="btn btn-label-primary d-flex align-items-center me-3"><i
                                class="bx bx-user-plus me-1"></i>Connect</a>
                        <a href="javascript:;" class="btn btn-label-secondary btn-icon"><i class="bx bx-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="dropdown btn-pinned">
                        <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                        </ul>
                    </div>
                    <div class="mx-auto mb-3">
                        <img src="../../assets/img/avatars/5.png" alt="Avatar Image" class="rounded-circle w-px-100">
                    </div>
                    <h5 class="mb-1 card-title">Francis Byrd</h5>
                    <span>Developer</span>
                    <div class="d-flex align-items-center justify-content-center my-3 gap-2">
                        <a href="javascript:;" class="me-1"><span class="badge bg-label-info">React</span></a>
                        <a href="javascript:;"><span class="badge bg-label-primary">HTML</span></a>
                    </div>

                    <div class="d-flex align-items-center justify-content-around my-4 py-2">
                        <div>
                            <h4 class="mb-1">32</h4>
                            <span>Projects</span>
                        </div>
                        <div>
                            <h4 class="mb-1">1.25k</h4>
                            <span>Tasks</span>
                        </div>
                        <div>
                            <h4 class="mb-1">890</h4>
                            <span>Connections</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="javascript:;" class="btn btn-label-primary d-flex align-items-center me-3"><i
                                class="bx bx-user-plus me-1"></i>Connect</a>
                        <a href="javascript:;" class="btn btn-label-secondary btn-icon"><i class="bx bx-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="dropdown btn-pinned">
                        <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                        </ul>
                    </div>
                    <div class="mx-auto mb-3">
                        <img src="../../assets/img/avatars/18.png" alt="Avatar Image" class="rounded-circle w-px-100">
                    </div>
                    <h5 class="mb-1 card-title">Leon Lucas</h5>
                    <span>UI/UX Designer</span>
                    <div class="d-flex align-items-center justify-content-center my-3 gap-2">
                        <a href="javascript:;" class="me-1"><span class="badge bg-label-secondary">Figma</span></a>
                        <a href="javascript:;" class="me-1"><span class="badge bg-label-warning">Sketch</span></a>
                        <a href="javascript:;"><span class="badge bg-label-primary">Photoshop</span></a>
                    </div>

                    <div class="d-flex align-items-center justify-content-around my-4 py-2">
                        <div>
                            <h4 class="mb-1">86</h4>
                            <span>Projects</span>
                        </div>
                        <div>
                            <h4 class="mb-1">12.4k</h4>
                            <span>Tasks</span>
                        </div>
                        <div>
                            <h4 class="mb-1">890</h4>
                            <span>Connections</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="javascript:;" class="btn btn-label-primary d-flex align-items-center me-3"><i
                                class="bx bx-user-plus me-1"></i>Connect</a>
                        <a href="javascript:;" class="btn btn-label-secondary btn-icon"><i
                                class="bx bx-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="dropdown btn-pinned">
                        <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                        </ul>
                    </div>
                    <div class="mx-auto mb-3">
                        <img src="../../assets/img/avatars/9.png" alt="Avatar Image" class="rounded-circle w-px-100">
                    </div>
                    <h5 class="mb-1 card-title">Jayden Rogers</h5>
                    <span>Full Stack Developer</span>
                    <div class="d-flex align-items-center justify-content-center my-3 gap-2">
                        <a href="javascript:;" class="me-1"><span class="badge bg-label-info">React</span></a>
                        <a href="javascript:;" class="me-1"><span class="badge bg-label-danger">Angular</span></a>
                        <a href="javascript:;"><span class="badge bg-label-primary">HTML</span></a>
                    </div>

                    <div class="d-flex align-items-center justify-content-around my-4 py-2">
                        <div>
                            <h4 class="mb-1">244</h4>
                            <span>Projects</span>
                        </div>
                        <div>
                            <h4 class="mb-1">23.8k</h4>
                            <span>Tasks</span>
                        </div>
                        <div>
                            <h4 class="mb-1">2.14k</h4>
                            <span>Connections</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="javascript:;" class="btn btn-primary d-flex align-items-center me-3"><i
                                class="bx bx-user-check me-1"></i>Connected</a>
                        <a href="javascript:;" class="btn btn-label-secondary btn-icon"><i
                                class="bx bx-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <div class="dropdown btn-pinned">
                        <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                        </ul>
                    </div>
                    <div class="mx-auto mb-3">
                        <img src="../../assets/img/avatars/10.png" alt="Avatar Image" class="rounded-circle w-px-100">
                    </div>
                    <h5 class="mb-1 card-title">Jeanette Powell</h5>
                    <span>SEO</span>
                    <div class="d-flex align-items-center justify-content-center my-3 gap-2">
                        <a href="javascript:;" class="me-1"><span class="badge bg-label-success">Writing</span></a>
                        <a href="javascript:;"><span class="badge bg-label-secondary">Analysis</span></a>
                    </div>

                    <div class="d-flex align-items-center justify-content-around my-4 py-2">
                        <div>
                            <h4 class="mb-1">32</h4>
                            <span>Projects</span>
                        </div>
                        <div>
                            <h4 class="mb-1">1.28k</h4>
                            <span>Tasks</span>
                        </div>
                        <div>
                            <h4 class="mb-1">1.27k</h4>
                            <span>Connections</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="javascript:;" class="btn btn-label-primary d-flex align-items-center me-3"><i
                                class="bx bx-user-plus me-1"></i>Connect</a>
                        <a href="javascript:;" class="btn btn-label-secondary btn-icon"><i
                                class="bx bx-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <p>Jalur Pendaftaran</p>
                    <h5 class="text-white fw-bold">ZONASI</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-arrow-circle-right"></i>
                </div>
                <a href="{{ route('dashboard_siswa') }}" class="small-box-footer">Klik Disini &nbsp;
                    <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <p>Jalur Pendaftaran</p>
                    <h5 class="text-white fw-bold">Pindah Tugas
                    </h5>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="{{ route('dashboard_siswa') }}" class="small-box-footer">Klik Disini &nbsp;
                    <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <p>Jalur Pendaftaran</p>
                    <h5 class="text-white fw-bold">AFIRMASI</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-brands fa-github"></i>
                </div>
                <a href="{{ route('dashboard_siswa') }}" class="small-box-footer">Klik Disini &nbsp;
                    <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <p>Jalur Pendaftaran</p>
                    <h5 class="text-white fw-bold">PRESTASI</h5>
                </div>
                <div class="icon">
                    {{-- <i class="fas fa-arrow-circle-right"></i> --}}
                    <i class="fas fa-duotone fa-circle-exclamation"></i>
                </div>
                <a href="{{ route('dashboard_siswa') }}" class="small-box-footer">Klik Disini &nbsp;
                    <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
@endsection

@push('after-style')
    <style>
        .small-box {
            border-radius: 0.25rem;
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            display: block;
            position: relative;
            color: #ffffff !important;
        }

        .small-box>.inner {
            padding: 10px;
        }

        .small-box .icon {
            color: rgba(0, 0, 0, .15);

        }


        .small-box .icon>i.fas {
            font-size: 70px;
            top: 20px;
        }

        .small-box .icon>i {
            font-size: 90px;
            position: absolute;
            right: 15px;
            top: 15px;
        }

        .small-box>.small-box-footer {
            background-color: rgba(0, 0, 0, .1);
            color: rgba(255, 255, 255, .8);
            display: block;
            padding: 3px 0;
            position: relative;
            text-align: center;
            text-decoration: none;
            z-index: 10;
        }
    </style>
@endpush
