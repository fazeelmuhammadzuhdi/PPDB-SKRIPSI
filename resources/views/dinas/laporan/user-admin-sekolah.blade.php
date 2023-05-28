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
                    <th>Name</th>
                    <th>Email / Username</th>
                    <th>Hak Akses</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userAdminDanSekolah as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->akses }}</td>
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
