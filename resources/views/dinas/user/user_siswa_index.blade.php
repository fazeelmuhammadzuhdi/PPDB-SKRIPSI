@extends('layouts.main')

@section('content')
    @if (auth()->user()->akses == 'Admin Dinas')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">{{ $title }}</h3> <small class="text-muted float-end">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Hp</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucwords($item->name) }}</td>
                                            <td>{{ $item->nohp }}</td>
                                            <td>{{ $item->email }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Data Tidak Ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger alert-dismissible" role="alert">
            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
            <p class="mb-0">Tidak Ada Data</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush
