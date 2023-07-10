<?php

namespace App\Http\Controllers;

use App\Models\Afirmasi;
use App\Models\Kampung;
use App\Models\Kecamatan;
use App\Models\Nagari;
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
        $now = now()->format('Y');
        if (auth()->user()->akses == 'Admin Dinas') {
            $siswa = Siswa::whereYear('created_at', $now)->count();
            $jumlahSekolah = Sekolah::count();
            $jumlahKecamatan = Kecamatan::count();
            $jumlahNagari = Nagari::count();
            $jumlahKampung = Kampung::count();

            $siswaLulusPrestasi = Prestasi::where('status', 1)->whereYear('created_at', $now)->count();
            $siswaLulusAfirmasi = Afirmasi::where('status', 1)->whereYear('created_at', $now)->count();
            $siswaLulusPindahTugas = PindahTugas::where('status', 1)->whereYear('created_at', $now)->count();
            $siswaLulusZonasi = Zonasi::where('status', 1)->whereYear('created_at', $now)->count();
            $totalSiswaLulus = $siswaLulusAfirmasi + $siswaLulusPrestasi + $siswaLulusPindahTugas + $siswaLulusZonasi;

            return view('dinas.dashboard_dinas', compact('siswa', 'jumlahSekolah', 'jumlahKecamatan', 'jumlahNagari', 'jumlahKampung', 'totalSiswaLulus'));
        }

        if (auth()->user()->akses == 'Kepala Dinas') {
            $siswa = Siswa::whereYear('created_at', $now)->count();
            $jumlahSekolah = Sekolah::count();
            $jumlahKecamatan = Kecamatan::count();
            $jumlahNagari = Nagari::count();
            $jumlahKampung = Kampung::count();
            //Menghitunga Jumlah Siswa Lulus
            $siswaLulusPrestasi = Prestasi::where('status', 1)->whereYear('created_at', $now)->count();
            $siswaLulusAfirmasi = Afirmasi::where('status', 1)->whereYear('created_at', $now)->count();
            $siswaLulusPindahTugas = PindahTugas::where('status', 1)->whereYear('created_at', $now)->count();
            $siswaLulusZonasi = Zonasi::where('status', 1)->whereYear('created_at', $now)->count();
            $totalSiswaLulus = $siswaLulusAfirmasi + $siswaLulusPrestasi + $siswaLulusPindahTugas + $siswaLulusZonasi;

            return view('dinas.dashboard_dinas', compact('siswa', 'jumlahSekolah', 'jumlahKecamatan', 'jumlahNagari', 'jumlahKampung', 'totalSiswaLulus'));
        }

        if (auth()->user()->akses == 'Admin Sekolah') {
            $sekolah = Sekolah::sekolah()->first();
            $siswaLulusPrestasi = Prestasi::whereYear('created_at', $now)->where('status', 1)->where('sekolah_id', $sekolah?->id)->count();
            $siswaLulusAfirmasi = Afirmasi::whereYear('created_at', $now)->where('status', 1)->where('sekolah_id', $sekolah?->id)->count();
            $siswaLulusPindahTugas = PindahTugas::whereYear('created_at', $now)->where('status', 1)->where('sekolah_id', $sekolah?->id)->count();
            $siswaLulusZonasi = Zonasi::whereYear('created_at', $now)->where('status', 1)->where('sekolah_id', $sekolah?->id)->count();
            $totalSiswaLulus = $siswaLulusAfirmasi + $siswaLulusPrestasi + $siswaLulusPindahTugas + $siswaLulusZonasi;

            $siswaBelumLulusAfirmasi = Afirmasi::whereYear('created_at', $now)->where('status', 2)->where('sekolah_id', $sekolah?->id)->count();
            $siswaBelumLulusPrestasi = Prestasi::whereYear('created_at', $now)->where('status', 2)->where('sekolah_id', $sekolah?->id)->count();
            $siswaBelumLulusPindahTugas = PindahTugas::whereYear('created_at', $now)->where('status', 2)->where('sekolah_id', $sekolah?->id)->count();
            $siswaBelumLulusZonasi = Zonasi::whereYear('created_at', $now)->where('status', 2)->where('sekolah_id', $sekolah?->id)->count();
            $totalSiswaBelumLulus = $siswaBelumLulusAfirmasi + $siswaBelumLulusPrestasi + $siswaBelumLulusPindahTugas + $siswaBelumLulusZonasi;

            $afirmasi = Afirmasi::where('sekolah_id', $sekolah?->id)->whereYear('created_at', $now)->count();
            $pindahTugas = PindahTugas::where('sekolah_id', $sekolah?->id)->whereYear('created_at', $now)->count();
            $prestasi = Prestasi::where('sekolah_id', $sekolah?->id)->whereYear('created_at', $now)->count();
            $zonasi = Zonasi::where('sekolah_id', $sekolah?->id)->whereYear('created_at', $now)->count();

            return view('dinas.dashboard_dinas', compact('afirmasi', 'pindahTugas', 'prestasi', 'totalSiswaLulus', 'totalSiswaBelumLulus', 'zonasi'));
        }
    }
}
