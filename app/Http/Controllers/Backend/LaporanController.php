<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Afirmasi;
use App\Models\PindahTugas;
use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $afirmasi = Afirmasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $prestasi = Prestasi::with('sekolah', 'siswa')->where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        $siswa = Siswa::with('afirmasis', 'pindahTugas', 'prestasis')->get();
        // dd($user);
        return view('laporan.index', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi'));
    }
}
