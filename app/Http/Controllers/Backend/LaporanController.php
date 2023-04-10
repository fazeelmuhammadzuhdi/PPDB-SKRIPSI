<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Afirmasi;
use App\Models\PindahTugas;
use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function lulus()
    {
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $afirmasi = Afirmasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $prestasi = Prestasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $siswa = Siswa::with('afirmasis', 'pindahTugas', 'prestasis')->get();
        // dd($user);
        return view('laporan.lulus', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi'));
    }

    public function cetakPdf()
    {
        $sekolah = Sekolah::sekolah()->first();
        $afirmasi = Afirmasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $pindahTugas = PindahTugas::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $prestasi = Prestasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $siswa = Siswa::with('afirmasis', 'pindahTugas', 'prestasis')->get();

        $pdf = PDF::loadView('laporan.siswa_lulus', [
            'afirmasi' => $afirmasi,
            'siswa' => $siswa,
            'pindahTugas' => $pindahTugas,
            'prestasi' => $prestasi,
            'sekolah' => $sekolah
        ])->setOptions(['defaultFont' => 'sans-serif']);;
        return $pdf->stream("LAPORAN SISWA LULUS.pdf");
    }

    public function ditolak()
    {
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $afirmasi = Afirmasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        $prestasi = Prestasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 2)->get();
        $siswa = Siswa::with('afirmasis', 'pindahTugas', 'prestasis')->get();
        // dd($user);
        return view('laporan.ditolak', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi'));
    }
}
