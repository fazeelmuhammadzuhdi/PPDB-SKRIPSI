<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    @include('laporan.style_header_coba')
</head>

<body>
    <center>
        @include('laporan.header_coba')

        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <h1>{{ $title }}</h1>
            </tr>
        </table>
        @php
            $sekarang = now();
        @endphp

        <div class="filter-tanggal">
            <table>

                <tr>
                    <td>Tanggal Cetak</td>
                    <td>: {{ \Carbon\Carbon::parse($sekarang)->formatLocalized('%d %B %Y %H:%M:%S') }}</td>
                </tr>
            </table>

        </div>
        <table border="1" class="body">
            <thead>
                <tr style="height: 25px;">
                    <th>No</th>
                    <th>Nama Kecamatan</th>
                    <th>Nama Nagari Berdasarkan Kecamatan</th>
                    <th>Nama Kampung Berdasarkan Kecamatan Dan Nagari</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kecamatan as $data)
                    <tr style="text-align: center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kecamatan }}</td>
                        <td>
                            @foreach ($data->nagari as $nagari)
                                {{ $loop->iteration }}. {{ $nagari->nama_nagari }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($data->kampung as $kampung)
                                {{ $loop->iteration }}. {{ $kampung->nama_kampung }}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('laporan.tanda_tangan')
    </center>
</body>

<script>
    window.print();
</script>

</html>
