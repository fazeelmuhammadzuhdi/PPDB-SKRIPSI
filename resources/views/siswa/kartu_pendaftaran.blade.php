<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Cetak Kartu Pendaftaran</title>


    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .table-tagihan {
            border: 1px solid #000;
            border-collapse: collapse;

        }

        .table-tagihan th {
            background: #eee;
            padding: 4px;
            border: 1px solid #000;
        }

        .table-tagihan td {
            padding: 4px;
            border: 1px solid #000;

        }

        a {
            text-decoration: none;
        }

        a.btn {
            background-color: #3498db !important;
            color: #fff;
            border: 0;
            border-radius: 6px;
            cursor: pointer;
            font-family: inherit;
            padding: 8px 30px;
            margin: 5px;
            font-size: 14px;
        }

        a.btn:hover {
            background-color: #09466f !important;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">



            <tr class="information">
                <td colspan="3">
                    <table>
                        @foreach ($cek_siswa->prestasis as $item)
                            @if ($item->status == 1)
                                <tr>
                                    <td width="45%"><b>Jalur Pendaftaran</b></td>
                                    <td>: PRESTASI</td>
                                </tr>
                            @endif
                        @endforeach
                        @foreach ($cek_siswa->pindahTugas as $item)
                            @if ($item->status == 1)
                                <tr>
                                    <td width="45%"><b>Jalur Pendaftaran</b></td>
                                    <td>: PINDAH TUGAS</td>
                                </tr>
                            @endif
                        @endforeach
                        @foreach ($cek_siswa->afirmasis as $item)
                            @if ($item->status == 1)
                                <tr>
                                    <td width="45%"><b>Jalur Pendaftaran</b></td>
                                    <td>: AFIRMASI</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                            <td><b>Sekolah Pendaftaran</b></td>
                            <td>: {{ $item->sekolah->nama }}</td>
                        </tr>
                        <tr>
                            <td><b>NISN</b></td>
                            <td>: {{ $item->siswa->nisn }}</td>
                        </tr>
                        <tr>
                            <td><b>NIK</b></td>
                            <td>: {{ $item->siswa->no_nik }}</td>
                        </tr>
                        <tr>
                            <td><b>Nama Lengkap</b></td>
                            <td>: {{ $item->siswa->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td><b>Asal Sekolah</b></td>
                            <td>: {{ $item->siswa->sekolah_asal }}</td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td>: {{ $item->siswa->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td><b>Tempat / Tanggal Lahir</b></td>
                            <td>: </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <br>
                    Padang, {{ now()->translatedFormat('d F Y') }} <br>

                </td>
            </tr>

        </table>

    </div>
</body>

</html>
