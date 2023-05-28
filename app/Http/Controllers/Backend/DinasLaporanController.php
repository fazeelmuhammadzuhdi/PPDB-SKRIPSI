<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
}
