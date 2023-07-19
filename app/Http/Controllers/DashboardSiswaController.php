<?php

namespace App\Http\Controllers;

use App\Models\Afirmasi;
use App\Models\PindahTugas;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\Zonasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DashboardSiswaController extends Controller
{
    public function index()
    {
        $cek = Siswa::siswa()->count();
        $cek_siswa = Siswa::siswa()->first();

        if ($cek < 1) {
            $pesan = "Biodata Kamu Belum Lengkap !";
        } else {
            $pesan = "Biodata Kamu Telah Lengkap.. Terima Kasih";
        }
        return view('siswa.dashboard_siswa', compact('pesan', 'cek'));
    }

    public function jalurPendaftaran()
    {
        $cek = Siswa::siswa()->count();
        $cek_siswa = Siswa::siswa()->first();
        $cekLulusJalurPrestasi = Prestasi::where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusJalurAfirmasi = Afirmasi::where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusJalurPindahTugas = PindahTugas::where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusJalurZonasi = Zonasi::where('siswa_id', $cek_siswa->id ?? '')->first();
        //cek apakah siswa sudah pernah mendaftar melalui jalur prestasi, afirmasi dll
        $cek_prestasi = Prestasi::where('siswa_id', $cek_siswa->id  ?? '')->count();
        $cek_afirmasi = Afirmasi::where('siswa_id', $cek_siswa->id ?? '')->count();
        $cek_pindah_tugas = PindahTugas::where('siswa_id', $cek_siswa->id ?? '')->count();
        $cek_zonasi = Zonasi::where('siswa_id', $cek_siswa->id ?? '')->count();
        // dd($cek_afirmasi);
        // dd($cek_prestasi);
        return view('siswa.jalur_pendaftaran', compact( 'cek','cek_prestasi','cekLulusJalurPrestasi','cek_siswa','cek_afirmasi','cekLulusJalurAfirmasi',
            'cek_pindah_tugas',
            'cekLulusJalurPindahTugas',
            'cek_zonasi',
            'cekLulusJalurZonasi'
        ));
    }

    public function kartuPendaftaran(Request $request)
    {
        $cari = $request->cari;
        $cek_siswa = Siswa::where(
            'no_pendaftaran',
            'like',
            "%" . $cari . "%"
        )->where('user_id', auth()->user()->id)->first();
        $pdf = PDF::loadview('siswa.kartu_pendaftaran', ['cek_siswa' => $cek_siswa]);
        return $pdf->stream('kartuPendaftaran.pdf');
    }

    public function cek()
    {
        $tanggalAkhirKelulusan = settings('jadwa_kelulusan');
        $tanggalSekarang = now()->toDateString();
        $now = now()->format('Y');
        $cek_siswa = Siswa::siswa()->first();
        $cekLulusJalurPrestasi = Prestasi::whereYear('created_at', $now)->where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusJalurAfirmasi = Afirmasi::whereYear('created_at', $now)->where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusJalurPindahTugas = PindahTugas::whereYear('created_at', $now)->where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusJalurZonasi = Zonasi::whereYear('created_at', $now)->where('siswa_id', $cek_siswa->id ?? '')->first();
        return view('siswa.cek_kelulusan', compact(
            'tanggalAkhirKelulusan',
            'tanggalSekarang',
            'cekLulusJalurPrestasi',
            'cekLulusJalurAfirmasi',
            'cekLulusJalurPindahTugas',
            'cekLulusJalurZonasi'
        ));
    }

    public function cari(Request $request)
    {
        $now = now()->format('Y');
        $cek_siswa = Siswa::siswa()->whereYear('created_at', $now)->first();
        return view('siswa.hasil', compact('cek_siswa'));
    }
    public function viewCekHasil()
    {
        $tanggalAkhirKelulusan = settings('jadwa_kelulusan');
        $tanggalSekarang = now()->toDateString();
        $now = now()->format('Y');
        $cek_siswa = Siswa::siswa()->first();
        $cekLulusJalurPrestasi = Prestasi::whereYear('created_at', $now)->where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusJalurAfirmasi = Afirmasi::whereYear('created_at', $now)->where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusJalurPindahTugas = PindahTugas::whereYear('created_at', $now)->where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusJalurZonasi = Zonasi::whereYear('created_at', $now)->where('siswa_id', $cek_siswa->id ?? '')->first();
        return view('siswa.v_cek_hasil', compact(
            'tanggalAkhirKelulusan',
            'tanggalSekarang',
            'cekLulusJalurPrestasi',
            'cekLulusJalurAfirmasi',
            'cekLulusJalurPindahTugas',
            'cekLulusJalurZonasi'
        ));
    }
}
