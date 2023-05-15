@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Applications</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active">Sekolah</li>
            </ol>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        Data Zonasi Sekolah
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="myTableKampung">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Sekolah</th>
                                    <th>NPSN Sekolah</th>
                                    <th>Kecamatan</th>
                                    <th>Nagari Zonasi</th>
                                    <th>Kampung Zonasi</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($sekolah as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->npsn }}</td>
                                        <td>
                                            @foreach ($kecamatan as $kec)
                                                @if ($kec->sekolah_id == $item->id)
                                                    {{ $kec->nama_kecamatan }}
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach ($nagari as $nag)
                                                @if ($nag->sekolah_id == $item->id)
                                                    {{ $nag->nama_nagari . ',' }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($kampung as $kam)
                                                @if ($kam->sekolah_id == $item->id)
                                                    {{ $kam->nama_kampung . ',' }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>

                                            <a href="{{ route('data_zonasi_sekolah.show', $item->id) }}"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- @foreach ($kecamatan as $item)
                                    @foreach ($item->zonasiSekolah as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->sekolah->nama }}</td>
                                            <td>{{ $data->sekolah->npsn }}</td>
                                            <td>{{ $item->nama_kecamatan }}</td>
                                            <td>
                                                @foreach ($nagari as $n)
                                                    @if ($n->id == $data->nagari_id)
                                                        {{ $n->nama_nagari }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($kampung as $k)
                                                    @if ($k->id == $data->kampung_id)
                                                        {{ $k->nama_kampung }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach --}}


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
