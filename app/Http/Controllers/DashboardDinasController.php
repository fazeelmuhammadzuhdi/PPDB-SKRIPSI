<?php

namespace App\Http\Controllers;

use App\Models\Afirmasi;
use App\Models\PindahTugas;
use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class DashboardDinasController extends Controller
{
    public function index()
    {

        $sekolah = Sekolah::sekolah()->first();
        $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)->count();
        $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)->count();
        $prestasi = Prestasi::where('sekolah_id', $sekolah->id)->count();
        $siswa = Siswa::count();
        $sekolah = Sekolah::count();
        return view('dinas.dashboard_dinas', compact('afirmasi', 'pindahTugas', 'prestasi', 'siswa'));
    }
}
