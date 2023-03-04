<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSiswaController extends Controller
{
    public function index()
    {
        $cek = Siswa::where('user_id', Auth::user()->id)->count();

        // dd($cek);
        if ($cek < 1) {
            $pesan = "Biodata Anda Belum Lengkap !!!";
        } else {
            $pesan = "Biodata Anda Telah Lengkap.. Terima Kasih";
        }
        return view('siswa.dashboard_siswa', compact('pesan', 'cek'));
    }
}
