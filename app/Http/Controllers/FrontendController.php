<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $tanggalSekarang = now()->toDateString();
        $tanggalAkhirPendaftaran = settings('akhir_pendaftaran');
        return view('frontend.index', compact('tanggalSekarang', 'tanggalAkhirPendaftaran'));
    }


    public function informasiPendafaran()
    {
        return view('frontend.informasi-pendaftaran');
    }
}
