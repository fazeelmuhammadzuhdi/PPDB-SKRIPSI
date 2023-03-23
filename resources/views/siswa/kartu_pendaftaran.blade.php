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
            <tr>
                <td width="80">
                    @if (request('output') == 'pdf')
                        <img src="{{ public_path() . '/images/logo.png' }}" alt="" width="100">
                    @else
                        <img src="{{ asset('images/logo.png') }}" alt="" width="70">
                    @endif
                </td>

                <td style="text-align: left; vertical-align: middle;">
                    {{-- <div style="font-size: 20px; font-weight: bold">{{ settings()->get('app_name', 'My App') }}</div>
                    <div>{!! settings()->get('app_address') !!}</div> --}}
                    <div style="font-size: 26px; font-weight: bold">DINAS PENDIDIKAN PESISIR SELATAN</div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>


            <tr class="information">
                <td colspan="3">
                    <table>
                        @if ($cekLulus)
                            <tr>
                                <td width="45%"><b>Jalur Pendaftaran</b></td>
                                <td>: ZONASI</td>
                                <td rowspan="8">
                                    {{-- @if (request('output') == 'pdf')
                                        <img src="{{ storage_path($siswa->foto) }}" width="100%">
                                    @endif --}}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td><b>Sekolah Pendaftaran</b></td>
                            <td>: {{ $prestasi->sekolah->nama }}</td>
                        </tr>
                        <tr>
                            <td><b>NISN</b></td>
                            <td>: {{ $siswa->nisn }}</td>
                        </tr>
                        <tr>
                            <td><b>NIK</b></td>
                            <td>: {{ $siswa->no_nik }}</td>
                        </tr>
                        <tr>
                            <td><b>Nama Lengkap</b></td>
                            <td>: {{ $siswa->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td><b>Asal Sekolah</b></td>
                            <td>: {{ $siswa->sekolah_asal }}</td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td>: {{ $siswa->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td><b>Tempat / Tanggal Lahir</b></td>
                            <td>: {{ $siswa->getTempatTanggalLahirAttribute() }}</td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <br>
                    Padang, {{ now()->translatedFormat('d F Y') }} <br>
                    {{-- @include('siswa.informasi_penanggung_jawab') --}}

                </td>
            </tr>

        </table>
        <center>
            <a href="{{ url()->current() . '?output=pdf' }}" class="btn">
                Download Pdf</a>
            <a href="#" onclick="window.print()" class="btn">Cetak PDF</a>
        </center>
    </div>
</body>

</html>