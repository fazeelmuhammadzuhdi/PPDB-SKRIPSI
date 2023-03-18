<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class DashboardSiswaController extends Controller
{
    public function index()
    {
        $cek = Siswa::where('user_id', Auth::user()->id)->count();

        // dd($cek);
        if ($cek < 1) {
            $pesan = "Biodata Anda Belum Lengkap !";
        } else {
            $pesan = "Biodata Anda Telah Lengkap.. Terima Kasih";
        }
        return view('siswa.dashboard_siswa', compact('pesan', 'cek'));
    }

    public function jalurPendaftaran()
    {

        $cek = Siswa::where('user_id', Auth::user()->id)->count();
        //cek apakah siswa sudah pernah mendaftar melalui jalur prestasi
        $cek_siswa = Siswa::where('user_id', Auth::user()->id)->first();
        $cek_prestasi = Prestasi::where('siswa_id', $cek_siswa->id)->count();
        // dd($cek_prestasi);
        return view('siswa.jalur_pendaftaran', compact('cek', 'cek_prestasi'));
    }
}
