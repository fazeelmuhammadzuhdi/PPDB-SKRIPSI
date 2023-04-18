<?php

namespace App\Http\Controllers;

use App\Models\Afirmasi;
use App\Models\PindahTugas;
use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Zonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DashboardDinasController extends Controller
{
    public function index()
    {
        if (auth()->user()->akses == 'Admin Dinas') {
            $siswa = Siswa::count();
            $jumlahSekolah = Sekolah::count();
            return view('dinas.dashboard_dinas', compact('siswa', 'jumlahSekolah'));
        }

        if (auth()->user()->akses == 'Admin Sekolah') {
            $sekolah = Sekolah::sekolah()->first();
            $siswaLulusPrestasi = Prestasi::where('status', 1)->where('sekolah_id', $sekolah?->id)->count();
            $siswaLulusAfirmasi = Afirmasi::where('status', 1)->where('sekolah_id', $sekolah?->id)->count();
            $siswaLulusPindahTugas = PindahTugas::where('status', 1)->where('sekolah_id', $sekolah?->id)->count();
            $totalSiswaLulus = $siswaLulusAfirmasi + $siswaLulusPrestasi + $siswaLulusPindahTugas;

            $siswaBelumLulusAfirmasi = Afirmasi::where('status', 2)->where('sekolah_id', $sekolah?->id)->count();
            $siswaBelumLulusPrestasi = Prestasi::where('status', 2)->where('sekolah_id', $sekolah?->id)->count();
            $siswaBelumLulusPindahTugas = PindahTugas::where('status', 2)->where('sekolah_id', $sekolah?->id)->count();
            $totalSiswaBelumLulus = $siswaBelumLulusAfirmasi + $siswaBelumLulusPrestasi + $siswaBelumLulusPindahTugas;

            $afirmasi = Afirmasi::where('sekolah_id', $sekolah?->id)->count();
            $pindahTugas = PindahTugas::where('sekolah_id', $sekolah?->id)->count();
            $prestasi = Prestasi::where('sekolah_id', $sekolah?->id)->count();
            $zonasi = Zonasi::where('sekolah_id', $sekolah?->id)->count();

            return view('dinas.dashboard_dinas', compact('afirmasi', 'pindahTugas', 'prestasi', 'totalSiswaLulus', 'totalSiswaBelumLulus', 'zonasi'));
        }
    }
}
