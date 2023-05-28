<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Afirmasi;
use App\Models\PindahTugas;
use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Zonasi;
use App\Models\ZonasiSekolah;
use Illuminate\Http\Request;

class KelulusanController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::all();
        return view('kelulusan.index', compact('sekolah'));
    }

    public function kelulusan(Request $request)
    {
        // $idSek = $request->input('id_sekolah');

        $idSekolah = $request->input('id_sekolah');
        $sekolah = Sekolah::find($idSekolah);

        $afirmasi = Afirmasi::where('sekolah_id', $idSekolah)->where('status', 1)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::where('sekolah_id', $idSekolah)->where('status', 1)->get();
        $prestasi = Prestasi::where('sekolah_id', $idSekolah)->where('status', 1)->get();
        $zonasi = Zonasi::where('sekolah_id', $idSekolah)->where('status', 1)->get();

        $zonasiSekolah = ZonasiSekolah::where('sekolah_id', $idSekolah)->get();
        $siswa = Siswa::with(['kampung'])->get();

        return view('kelulusan.hasil', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi', 'zonasi', 'zonasiSekolah'));
    }
}
