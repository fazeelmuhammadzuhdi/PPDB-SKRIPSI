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
                        <img src="{{ public_path() . '/images/logo.png' }}" alt="" width="70">
                    @else
                        <img src="{{ asset('images/logo.png') }}" alt="" width="70">
                    @endif
                </td>

                {{-- <td style="text-align: left; vertical-align: middle;">
                    <div style="font-size: 20px; font-weight: bold">{{ settings()->get('app_name', 'My App') }}</div>
                    <div>{!! settings()->get('app_address') !!}</div>
                </td> --}}
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>

            <tr class="information">
                <td colspan="3">
                    <table>

                        <tr>
                            <td>
                                Nama Siswa : {{ $siswa->nama }} {{ $siswa->nisn }}<br />
                                Kelas : {{ $siswa->kelas }}<br />
                                Jurusan : {{ $siswa->jurusan }}
                            </td>

                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <table width="100%" class="table-tagihan">
                        <tr class="heading">
                            <th width="1%" style="text-align: center">No.</th>
                            <th style="text-align: start">Bulan Tagihan</th>
                            <th style="text-align: center">Jumlah Tagihan</th>
                            <th style="text-align: center">Tanggal Bayar</th>
                            <th style="text-align: center">Paraf</th>
                            <th style="text-align: center">Keterangan</th>
                        </tr>

                        {{-- @foreach ($kartuSpp as $item)
                            <tr class="item">
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td style="text-align: start">{{ $item['bulan'] . ' ' . $item['tahun'] }}</td>
                                <td style="text-align: end">{{ formatRupiah($item['total_tagihan']) }}</td>
                                <td style="text-align: center">{{ $item['tanggal_bayar'] }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach --}}
                    </table>
                </td>
            </tr>


            <tr>
                <td colspan="3">
                    <br>
                    Padang, {{ now()->translatedFormat('d F Y') }} <br>
                    @include('informasi_penanggung_jawab')

                </td>
            </tr>

        </table>
        <center>
            <a href="{{ url()->full() . '&output=pdf' }}" class="btn">
                Download Pdf</a>
            <a href="#" onclick="window.print()" class="btn">Cetak PDF</a>
        </center>
    </div>
</body>

</html>
