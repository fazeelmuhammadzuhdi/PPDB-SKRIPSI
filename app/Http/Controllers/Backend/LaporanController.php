<?php

namespace App\Http\Controllers\Backend;

use App\Exports\SiswaBelumLulusJalurAfirmasi;
use App\Exports\SiswaBelumLulusJalurPindahTugas;
use App\Exports\SiswaBelumLulusJalurPrestasi;
use App\Exports\SiswaBelumLulusJalurZonasi;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\Afirmasi;
use App\Models\Prestasi;
use App\Models\PindahTugas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SiswaLulusExport;
use App\Exports\SiswaLulusJalurAfirmasi;
use App\Exports\SiswaLulusJalurPindahTugas;
use App\Exports\SiswaLulusJalurPrestasi;
use App\Exports\SiswaLulusJalurZonasi;
use App\Http\Controllers\Controller;
use App\Models\Zonasi;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function lulus()
    {
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $prestasi = Prestasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $zonasi = Zonasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();

        $siswa = Siswa::get();
        // dd($user);
        return view('laporan.lulus', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi', 'zonasi'));
    }

    public function ditolak()
    {
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        $prestasi = Prestasi::where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        $zonasi = Zonasi::where('sekolah_id', $sekolah->id)->where('status', 2)->get();

        $siswa = Siswa::get();
        // dd($user);
        return view('laporan.ditolak', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi', 'zonasi'));
    }


    public function cetakPdfSiswaLulus()
    {
        $sekolah = Sekolah::sekolah()->first();
        $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $prestasi = Prestasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $zonasi = Zonasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get();

        $siswa = Siswa::get();

        // $pdf = PDF::loadView('laporan.siswa_lulus', [
        //     'afirmasi' => $afirmasi,
        //     'siswa' => $siswa,
        //     'pindahTugas' => $pindahTugas,
        //     'prestasi' => $prestasi,
        //     'sekolah' => $sekolah
        // ])->setOptions(['defaultFont' => 'sans-serif']);;
        // return $pdf->stream("LAPORAN SISWA LULUS.pdf");
        return view('laporan.siswa_lulus', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi', 'zonasi'));
    }

    public function cetakPdfSiswaDitolak()
    {
        $sekolah = Sekolah::sekolah()->first();
        $afirmasi = Afirmasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        $pindahTugas = PindahTugas::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        $prestasi = Prestasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        $zonasi = Zonasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        $siswa = Siswa::get();

        // $pdf = PDF::loadView('laporan.siswa_lulus', [
        //     'afirmasi' => $afirmasi,
        //     'siswa' => $siswa,
        //     'pindahTugas' => $pindahTugas,
        //     'prestasi' => $prestasi,
        //     'sekolah' => $sekolah
        // ])->setOptions(['defaultFont' => 'sans-serif']);;
        // return $pdf->stream("LAPORAN SISWA LULUS.pdf");
        return view('laporan.siswa_ditolak', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi', 'zonasi'));
    }

    public function exportExcelSiswaLulus()
    {
        // return Excel::download(new SiswaLulusExport, 'siswaLulus-' . Carbon::now()->timestamp . ' .xlsx' ?? '');
        return (new SiswaLulusExport)->download('siswaLulus.xlsx');
    }

    public function exportExcelAfirmasiSiswaLulus()
    {
        return (new SiswaLulusJalurAfirmasi)->download('siswaLulusJalurAfirmasi.xlsx');
    }

    public function exportExcelAfirmasiSiswaBelumLulus()
    {
        return (new SiswaBelumLulusJalurAfirmasi)->download('siswaBelumLulusJalurAfirmasi.xlsx');
    }

    public function exportExcelPindahTugasSiswaLulus()
    {
        return (new SiswaLulusJalurPindahTugas)->download('siswaLulusJalurPindahTugasOrangTua.xlsx');
    }

    public function exportExcelPindahTugasSiswaBelumLulus()
    {
        return (new SiswaBelumLulusJalurPindahTugas)->download('siswaBelumLulusJalurPindahTugasOrangTua.xlsx');
    }

    public function exportExcelPrestasiSiswaLulus()
    {
        return (new SiswaLulusJalurPrestasi)->download('siswaLulusJalurPrestasi.xlsx');
    }

    public function exportExcelPrestasiSiswaBelumLulus()
    {
        return (new SiswaBelumLulusJalurPrestasi)->download('siswaBelumLulusJalurPrestasi.xlsx');
    }

    public function exportExcelZonasiSiswaLulus()
    {
        return (new SiswaLulusJalurZonasi)->download('siswaLulusJalurZonasi.xlsx');
    }

    public function exportExcelZonasiSiswaBelumLulus()
    {
        return (new SiswaBelumLulusJalurZonasi)->download('siswaBelumLulusJalurZonasi.xlsx');
    }
}
