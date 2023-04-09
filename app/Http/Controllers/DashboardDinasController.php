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


        return view('dinas.dashboard_dinas', [
            'afirmasi' => Afirmasi::count(),
            'pindahTugas' => PindahTugas::count(),
            'prestasi' => Prestasi::count(),
            'siswa' => Siswa::count(),
            'sekolah' => Sekolah::count(),
        ]);
    }
}
