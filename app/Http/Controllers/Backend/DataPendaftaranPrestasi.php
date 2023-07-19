<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Afirmasi;
use App\Models\Penghargaan;
use App\Models\PindahTugas;
use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\Zonasi;
use App\Models\ZonasiSekolah;

class DataPendaftaranPrestasi extends Controller
{
    public function index()
    {
        // $now = now()->addYears('1')->format('Y');
        $now = now()->format('Y');
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $prestasi = Prestasi::with('siswa')->where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)
            ->orderBy('jumlah', 'desc')
            ->orderBy('created_at', 'asc')
            ->get();
        $afirmasi = Afirmasi::with('siswa')->where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::with('siswa')->where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->get();
        $zonasi = Zonasi::with('siswa')->where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->get();
        $zonasiSekolah = ZonasiSekolah::where('sekolah_id', $sekolah->id)->get();

        return view('sekolah.data_pendaftaran', compact('prestasi', 'sekolah', 'afirmasi', 'pindahTugas', 'zonasi', 'zonasiSekolah'));
    }
    public function create()
    {
        $now = now()->format('Y');

        $sekolah = Sekolah::sekolah()->first();
        $prestasi = Prestasi::with('siswa')->where('sekolah_id', $sekolah->id)
            ->whereYear('created_at', $now)
            ->where('status', 2)
            ->orderBy('jumlah', 'desc')
            ->get();
        return view('prestasi.siswa_lulus', compact('sekolah', 'prestasi'));
    }

    public function show($id)
    {
        $data_prestasi = Prestasi::findOrFail(decrypt($id));
        $penghargaan = Penghargaan::where('siswa_id', $data_prestasi->siswa_id)->get();
        return view('sekolah.detail_prestasi', compact('data_prestasi', 'penghargaan'));
    }
    public function update($id)
    {
        $lulus = Prestasi::where('id', $id)->update([
            'status' => 1
        ]);
        flash('Status Berhasil Di Update');
        return redirect()->route('data_pendaftaran_prestasi.index');
    }
    public function updateStatusDitolakPrestasi($id)
    {
        $lulus = Prestasi::where('id', $id)->update([
            'status' => 2
        ]);
        flash('Status Berhasil Di Update');
        return redirect()->route('data_pendaftaran_prestasi.index');
    }

    public function siswaLulusJalurPrestasi()
    {
        $now = now()->format('Y');
        $sekolah = Sekolah::sekolah()->first();
        $prestasi = Prestasi::with('siswa')->where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)
            ->where('status', 1)
            ->orderBy('jumlah', 'desc')
            ->get();
        return view('prestasi.siswa_lulus', compact('sekolah', 'prestasi'));
    }
}
