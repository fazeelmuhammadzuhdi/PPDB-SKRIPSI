<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kampung;
use App\Models\Kecamatan;
use App\Models\Nagari;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;

class DinasLaporanController extends Controller
{
    public function laporanUserAdminDanSekolah()
    {
        $userAdminDanSekolah = User::where('akses', 'Admin Sekolah')->orWhere('akses', 'Admin Dinas')->get();
        return view('dinas.laporan.user-admin-sekolah', [
            'userAdminDanSekolah' => $userAdminDanSekolah,
            'title' => 'Laporan User Admin Dinas Dan Sekolah',
        ]);
    }

    public function laporanUserSiswa()
    {
        $userSiswa = User::where('akses', 'Siswa')->get();
        return view('dinas.laporan.user-siswa', [
            'userSiswa' => $userSiswa,
            'title' => 'Laporan User Siswa',
        ]);
    }

    public function laporanDataSekolah()
    {
        $sekolah = Sekolah::with('adminSekolah')->latest()->get();
        return view('dinas.laporan.sekolah', [
            'sekolah' => $sekolah,
            'title' => 'Laporan Data Sekolah Kabupaten Pesisir Selatan',
        ]);
    }

    public function laporanKecamatan()
    {
        $kecamatan = Kecamatan::with(['nagari', 'kampung'])->orderBy('nama_kecamatan', 'asc')->get();
        return view('dinas.laporan.kecamatan', [
            'kecamatan' => $kecamatan,
            'title' => 'Laporan Data Kecamatan Di Kabupaten Pesisir Selatan',
        ]);
    }

    public function laporanNagari()
    {
        $nagari = Nagari::with(['kecamatan'])->orderBy('nama_nagari', 'asc')->get();
        return view('dinas.laporan.nagari', [
            'nagari' => $nagari,
            'title' => 'Laporan Data Nagari Di Kabupaten Pesisir Selatan',
        ]);
    }

    public function laporanKampung()
    {
        $kampung = Kampung::with(['kecamatan', 'nagari'])->orderBy('nama_kampung', 'asc')->get();
        return view('dinas.laporan.kampung', [
            'kampung' => $kampung,
            'title' => 'Laporan Data Kampung Di Kabupaten Pesisir Selatan',
        ]);
    }
}
