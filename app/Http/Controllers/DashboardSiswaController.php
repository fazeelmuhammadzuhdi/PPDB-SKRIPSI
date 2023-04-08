<?php

namespace App\Http\Controllers;

use App\Models\Afirmasi;
use App\Models\PindahTugas;
use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSiswaController extends Controller
{
    public function index()
    {
        $cek = Siswa::siswa()->count();
        $cek_siswa = Siswa::siswa()->first();
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

        $cek = Siswa::siswa()->count();
        $cek_siswa = Siswa::siswa()->first();
        $cekLulusJalurPrestasi = Prestasi::where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusJalurAfirmasi = Afirmasi::where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusJalurPindahTugas = PindahTugas::where('siswa_id', $cek_siswa->id ?? '')->first();
        //cek apakah siswa sudah pernah mendaftar melalui jalur prestasi, afirmasi dll
        $cek_prestasi = Prestasi::where('siswa_id', $cek_siswa->id  ?? '')->count();
        $cek_afirmasi = Afirmasi::where('siswa_id', $cek_siswa->id ?? '')->count();
        $cek_pindah_tugas = PindahTugas::where('siswa_id', $cek_siswa->id ?? '')->count();
        // dd($cek_afirmasi);
        // dd($cek_prestasi);
        return view('siswa.jalur_pendaftaran', compact('cek', 'cek_prestasi', 'cekLulusJalurPrestasi', 'cek_siswa', 'cek_afirmasi', 'cekLulusJalurAfirmasi', 'cek_pindah_tugas', 'cekLulusJalurPindahTugas'));
    }

    public function kartuPendaftaran()
    {
        $siswa = Siswa::siswa()->first();
        $prestasi = Prestasi::where('siswa_id', $siswa->id)->first();
        $cekLulus = Prestasi::where('siswa_id', $siswa->id)->count();

        if (request('output') == 'pdf') {
            $pdf = Pdf::loadView(
                'siswa.kartu_pendaftaran',
                [
                    'prestasi' => $prestasi,
                    'siswa' => $siswa,
                    'cekLulus' => $cekLulus
                ]
            );
            $namaFile = "Kartu Pendaftaran " . $siswa->nama_lengkap . ' Tahun ' . date('Y') . '.pdf';
            return $pdf->download($namaFile);
        }

        return view('siswa.kartu_pendaftaran', [
            'prestasi' => $prestasi,
            'siswa' => $siswa,
            'cekLulus' => $cekLulus,
            'title' => "Cetak Kartu Pendaftaran"
        ]);
    }

    public function cek()
    {
        return view('siswa.cek_kelulusan');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cek_siswa = Siswa::where('no_pendaftaran', 'like', "%" . $cari . "%")->first();
        $cekLulusPrestasi = Prestasi::where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusAfirmasi = Afirmasi::where('siswa_id', $cek_siswa->id ?? '')->first();
        $cekLulusPindahTugas = PindahTugas::where('siswa_id', $cek_siswa->id ?? '')->first();

        if (!$cekLulusPrestasi && !$cekLulusAfirmasi && !$cekLulusPindahTugas) {
            flash()->addError('Data Tidak Ada');
            return redirect()->back();
        } else {
            return view('siswa.hasil', compact('cekLulusPrestasi', 'cekLulusAfirmasi', 'cekLulusPindahTugas'));
        }
    }
}
