<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $tanggalSekarang = now()->toDateString();
        $tanggalAkhirPendaftaran = settings('akhir_pendaftaran');
        // dd($tanggalAkhirPendaftaran);
        return view('frontend.index', compact('tanggalSekarang', 'tanggalAkhirPendaftaran'));
    }

    public function informasiPendafaran()
    {
        return view('frontend.informasi-pendaftaran');
    }

    public function jadwalPendafaran()
    {
        $awalPendaftaran = settings('awal_pendaftaran');
        $akhirPendaftaran = settings('akhir_pendaftaran');
        $pengumumanKelulusan = settings('jadwa_kelulusan');
        return view('frontend.jadwal-pendaftaran', compact('awalPendaftaran', 'akhirPendaftaran', 'pengumumanKelulusan'));
    }
}
