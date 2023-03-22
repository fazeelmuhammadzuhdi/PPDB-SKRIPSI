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
        $cek_siswa = Siswa::where('user_id', Auth::user()->id)->first();
        // cek status kelulusan
        // $cek_lulus = Prestasi::where('siswa_id', $cek_siswa->id ?? '')->count();
        $cekLulus = Prestasi::where('siswa_id', $cek_siswa->id ?? '')->first();

        // dd($cek_lulus);
        // if ($cek_prestasi->status == 1) {
        //     $pesanLulus = "Selamat Anda Diterima Di Sekolah {$cek_prestasi->sekolah->nama}";
        // } elseif ($cek_prestasi->status == 2) {
        //     $pesanLulus = "Maaf Anda Belum Lulus";
        // } else {
        //     $pesanLulus = "Masih Dalam Tahap Seleksi";
        // }
        // dd($pesan);


        // dd($cek);
        if ($cek < 1) {
            $pesan = "Biodata Anda Belum Lengkap !";
        } else {
            $pesan = "Biodata Anda Telah Lengkap.. Terima Kasih";
        }
        // return view('siswa.dashboard_siswa', compact('pesan', 'cek', 'cek_lulus', 'pesanLulus'));
        return view('siswa.dashboard_siswa', compact('pesan', 'cek', 'cekLulus'));
    }

    public function jalurPendaftaran()
    {

        $cek = Siswa::where('user_id', Auth::user()->id)->count();
        //cek apakah siswa sudah pernah mendaftar melalui jalur prestasi
        $cek_siswa = Siswa::where('user_id', Auth::user()->id)->first();
        $cek_prestasi = Prestasi::where('siswa_id', $cek_siswa->id  ?? '')->count();
        // dd($cek_prestasi);
        return view('siswa.jalur_pendaftaran', compact('cek', 'cek_prestasi'));
    }
}
