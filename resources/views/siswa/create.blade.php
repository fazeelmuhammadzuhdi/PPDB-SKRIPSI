@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        @if ($cek == 1)
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <marquee behavior="" direction="">
                                ANDA SUDAH MELENGKAPI BIODATA
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <div class="col-xl-12">
                            <div class="nav-align-top mb-4">
                                <ul class="nav nav-pills mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home"
                                            aria-selected="true"><i class="bx bx-user"></i> Data Siswa</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                                            aria-selected="false" tabindex="-1"><i class="bx bx-user"></i> Data
                                            Ayah</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-pills-top-messages"
                                            aria-controls="navs-pills-top-messages" aria-selected="false" tabindex="-1"><i
                                                class="bx bx-user"></i> Data
                                            Ibu</button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="navs-pills-top-home" role="tabpanel">
                                        @include('siswa.partials.data_siswa')
                                    </div>
                                    <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                                        @include('siswa.partials.data_ayah')
                                    </div>
                                    <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                                        @include('siswa.partials.data_ibu')
                                    </div>
                                    <div class="text-end mt-2 -mb-2">
                                        <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary">Back</a>
                                        <button type="submit" class="btn btn-primary mx-2">Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection
