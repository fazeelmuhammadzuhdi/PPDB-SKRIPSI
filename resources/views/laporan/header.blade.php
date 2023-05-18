<div class="row">
    <table>
        <tr>
            <td width=80>
                <img src="{{ asset('images/logo.png') }}" alt="" width="100">
            </td>

            <td style="text-align: center; vertical-align: middle;">
                <div style="font-size: 20px; font-weight: bold">
                    {{ settings()->get('app_name', 'My App') }}
                    {{-- DINAS PENDIDIKAN DAN KEBUDAYAAN PESISIR SELATAN --}}
                </div>
                <div>{!! settings()->get('app_address') !!}</div>
                {{-- <div>Jl. H. Agus Salim, Painan, IV Jurai, Painan, Iv Jurai, Kabupaten Pesisir Selatan, Sumatera Barat
                    25651, Indonesia
                </div> --}}
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="text-end">
                <span class="mx-3">
                    Email : {{ settings()->get('app_email') }}
                    {{-- Email : diknaspessel@gmail.com --}}
                </span>
                <span class="mx-3">
                    Telp : {{ settings()->get('app_phone') }}
                    {{-- Telp : (0756) 21602 --}}
                </span>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>
<hr class="p-0 m-0 mb-3">
<div class="row">
    <div class="col-md-12">
        @if (Route::is('cetakpdf'))
            <h3 class="text-center text-primary">Data Siswa Yang Lulus</h3>
        @else
            <h3 class="text-center text-primary">Data Siswa Yang Belum Lulus</h3>
        @endif
    </div>
</div>
<table class="mt-0">
    <tr>
        <td style="width: 55%">Nama Sekolah</td>
        <td>: {{ $sekolah->nama }}</td>
    </tr>
    <br>
    <tr>
        <td>Akreditasi Sekolah</td>
        <td>: {{ $sekolah->akreditasi }}</td>
    </tr>
    <tr>
        <td>Tahun Ajaran</td>
        <td>: {{ now()->format('Y') }} / {{ now()->addYears(1)->format('Y') }}</td>
    </tr>
</table>
