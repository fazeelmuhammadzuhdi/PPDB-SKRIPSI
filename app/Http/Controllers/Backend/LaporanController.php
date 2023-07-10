<?php

namespace App\Http\Controllers\Backend;

use App\Exports\SiswaBelumLulusJalurAfirmasi;
use App\Exports\SiswaBelumLulusJalurPindahTugas;
use App\Exports\SiswaBelumLulusJalurPrestasi;
use App\Exports\SiswaBelumLulusJalurZonasi;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\Afirmasi;
use App\Models\Prestasi;
use App\Models\PindahTugas;
use App\Exports\SiswaLulusExport;
use App\Exports\SiswaLulusJalurAfirmasi;
use App\Exports\SiswaLulusJalurPindahTugas;
use App\Exports\SiswaLulusJalurPrestasi;
use App\Exports\SiswaLulusJalurZonasi;
use App\Http\Controllers\Controller;
use App\Models\Zonasi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function lulus()
    {
        $now = now()->format('Y');
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 1)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 1)->get();
        $prestasi = Prestasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 1)->get();
        $zonasi = Zonasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 1)->get();

        $siswa = Siswa::with('kampung')->get();
        // dd($user);
        return view('laporan.lulus', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi', 'zonasi', 'now'));
    }

    public function ditolak()
    {
        $now = now()->format('Y');
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 2)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 2)->get();
        $prestasi = Prestasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 2)->get();
        $zonasi = Zonasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 2)->get();

        $siswa = Siswa::with('kampung')->get();
        // dd($user);
        return view('laporan.ditolak', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi', 'zonasi', 'now'));
    }

    public function siswaPendaftar()
    {
        $now = now()->format('Y');
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->get();
        $prestasi = Prestasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->get();
        $zonasi = Zonasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->get();

        $siswa = Siswa::with('kampung')->get();
        // $siswa = Siswa::get();
        // dd($user);
        return view('laporan.pendaftar', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi', 'zonasi', 'now'));
    }

    public function cetakPdfDataPendaftar()
    {
        $now = now()->format('Y');
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->get();
        $prestasi = Prestasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->get();
        $zonasi = Zonasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->get();

        $siswa = Siswa::with('kampung')->get();

        return view('laporan.data_pendaftar', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi', 'zonasi', 'now'));
    }

    public function createLaporan()
    {
        return view('laporan.filter_laporan');
    }

    public function filterLaporan(Request $request)
    {

        $selectedYear = $request->input('tahunajaran');
        $selectedJalur = $request->input('jalur');
        $selectedStatus = (int) $request->input('status');
        $sekolah = Sekolah::sekolah()->first();
        $siswa = Siswa::with('kampung')->get();
        $title = "";

        $dataByJalur = [
            'AFIRMASI' => [],
            'PINDAH TUGAS' => [],
            'PRESTASI' => [],
            'ZONASI' => [],
        ];

        if ($request->filled('tahunajaran')) {
            if ($selectedJalur == 'zonasi' || !$selectedJalur) {
                $zonasi = Zonasi::where('sekolah_id', $sekolah->id)
                    ->whereYear('created_at', $selectedYear)
                    ->where('status', $selectedStatus)
                    ->get();
                foreach ($zonasi as $item) {
                    $dataByJalur['ZONASI'][] = $siswa->firstWhere('id', $item->siswa_id);
                }
            }
            if ($selectedJalur == 'prestasi' || !$selectedJalur) {
                $prestasi = Prestasi::where('sekolah_id', $sekolah->id)
                    ->whereYear('created_at', $selectedYear)
                    ->where('status', $selectedStatus)
                    ->orderBy('jumlah', 'desc')
                    ->orderBy('created_at', 'asc')
                    ->get();
                foreach ($prestasi as $item) {
                    $dataByJalur['PRESTASI'][] = $siswa->firstWhere('id', $item->siswa_id);
                }
            }
            if ($selectedJalur == 'afirmasi' || !$selectedJalur) {
                $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)
                    ->whereYear('created_at', $selectedYear)
                    ->where('status', $selectedStatus)
                    ->get();
                foreach ($afirmasi as $item) {
                    $dataByJalur['AFIRMASI'][] = $siswa->firstWhere('id', $item->siswa_id);
                }
            }
            if ($selectedJalur == 'pindahtugas' || !$selectedJalur) {
                $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)
                    ->whereYear('created_at', $selectedYear)
                    ->where('status', $selectedStatus)
                    ->get();
                foreach ($pindahTugas as $item) {
                    $dataByJalur['PINDAH TUGAS'][] = $siswa->firstWhere('id', $item->siswa_id);
                }
            }
        } else {
            $zonasi = Zonasi::where('sekolah_id', $sekolah->id)
                ->whereYear('created_at', $selectedYear)
                ->get();
            foreach ($zonasi as $item) {
                $dataByJalur['ZONASI'][] = $siswa->firstWhere('id', $item->siswa_id);
            }

            $prestasi = Prestasi::where('sekolah_id', $sekolah->id)
                ->whereYear('created_at', $selectedYear)
                ->orderBy('jumlah', 'desc')
                ->orderBy('created_at', 'asc')
                ->get();
            foreach ($prestasi as $item) {
                $dataByJalur['PRESTASI'][] = $siswa->firstWhere('id', $item->siswa_id);
            }

            $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)
                ->whereYear('created_at', $selectedYear)
                ->get();
            foreach ($afirmasi as $item) {
                $dataByJalur['AFIRMASI'][] = $siswa->firstWhere('id', $item->siswa_id);
            }

            $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)
                ->whereYear('created_at', $selectedYear)
                ->get();
            foreach ($pindahTugas as $item) {
                $dataByJalur['PINDAH TUGAS'][] = $siswa->firstWhere('id', $item->siswa_id);
            }
        }

        $now = now()->addYears('1')->format('Y');


        if ($selectedYear && $selectedJalur && $selectedStatus) {
            $statusLabel = ($selectedStatus == 1) ? 'LULUS' : 'BELUM LULUS';
            $title = "Laporan PPDB Berdasarkan: Tahun Ajaran $selectedYear - $now Dengan Jalur Pendaftaran $selectedJalur Dan Status $statusLabel";
        } elseif ($selectedYear && $selectedJalur) {
            $title = "Laporan PPDB Berdasarkan: Tahun Ajaran $selectedYear, Jalur $selectedJalur";
        } elseif ($selectedYear) {
            $title = "Laporan PPDB Berdasarkan: Tahun Ajaran $selectedYear";
        }


        return view("laporan.view_all_laporan", compact('selectedYear', 'dataByJalur', 'sekolah', 'title'));


        // $selectedYear = $request->input('tahunajaran');
        // $selectedJalur = $request->input('jalur');
        // $selectedStatus = (int)$request->input('status');
        // $sekolah = Sekolah::sekolah()->first();
        // $siswa = Siswa::with('kampung')->get();
        // $dataByJalur = [
        //     'AFIRMASI' => [],
        //     'PINDAH TUGAS' => [],
        //     'PRESTASI' => [],
        //     'ZONASI' => [],
        // ];

        // if ($request->filled('tahunajaran')) {
        //     if ($selectedJalur == 'zonasi' || $selectedJalur == '') {
        //         $zonasi = Zonasi::where('sekolah_id', $sekolah->id)
        //             ->whereYear('created_at', $selectedYear)
        //             ->pluck('siswa_id');
        //         $dataByJalur['ZONASI'] = $siswa->whereIn('id', $zonasi);
        //     }
        //     if ($selectedJalur == 'prestasi' || $selectedJalur == '') {
        //         $prestasi = Prestasi::where('sekolah_id', $sekolah->id)
        //             ->whereYear('created_at', $selectedYear);
        //         if ($selectedStatus !== '') {
        //             $prestasi->where('status', $selectedStatus);
        //         }
        //         $prestasi = $prestasi->pluck('siswa_id');
        //         $dataByJalur['PRESTASI'] = $siswa->whereIn('id', $prestasi);
        //     }
        //     if ($selectedJalur == 'afirmasi' || $selectedJalur == '') {
        //         $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)
        //             ->whereYear('created_at', $selectedYear);
        //         if ($selectedStatus !== '') {
        //             $afirmasi->where('status', $selectedStatus);
        //         }
        //         $afirmasi = $afirmasi->pluck('siswa_id');
        //         $dataByJalur['AFIRMASI'] = $siswa->whereIn('id', $afirmasi);
        //     }
        //     if ($selectedJalur == 'pindahtugas' || $selectedJalur == '') {
        //         $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)
        //             ->whereYear('created_at', $selectedYear);
        //         if ($selectedStatus !== '') {
        //             $pindahTugas->where('status', $selectedStatus);
        //         }
        //         $pindahTugas = $pindahTugas->pluck('siswa_id');
        //         $dataByJalur['PINDAH TUGAS'] = $siswa->whereIn('id', $pindahTugas);
        //     }
        // } else {
        //     $dataByJalur['ZONASI'] = $siswa;
        //     $dataByJalur['PRESTASI'] = $siswa;
        //     $dataByJalur['AFIRMASI'] = $siswa;
        //     $dataByJalur['PINDAH TUGAS'] = $siswa;
        // }

        // return view("laporan.view_all_laporan", compact('selectedYear', 'dataByJalur', 'sekolah'));
    }

    public function filterLaporanPerTahun(Request $request)
    {
        $selectedYear = $request->input('tahunajaran');
        $sekolah = Sekolah::sekolah()->first();
        $siswa = Siswa::with('kampung')->get();
        $now = now()->addYears('1')->format('Y');
        $title = "Laporan Calon Peserta Didik Yang Mendaftar PPDB Berdasarkan: Tahun Ajaran $selectedYear - $now";

        if ($request->filled('tahunajaran')) {
            $prestasi = Prestasi::where('sekolah_id', $sekolah->id)
                ->whereYear('created_at', $selectedYear)
                ->orderBy('jumlah', 'desc')
                ->orderBy('created_at', 'asc')
                ->get();

            $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)
                ->whereYear('created_at', $selectedYear)
                ->get();

            $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)
                ->whereYear('created_at', $selectedYear)
                ->get();

            $zonasi = Zonasi::where('sekolah_id', $sekolah->id)
                ->whereYear('created_at', $selectedYear)
                ->get();
        }
        return view("laporan.view_laporan_pertahun", compact('selectedYear', 'siswa', 'prestasi', 'afirmasi', 'pindahTugas', 'zonasi', 'sekolah', 'title'));
    }

    public function cetakPdfSiswaLulus()
    {
        $now = now()->format('Y');
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 1)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 1)->get();
        $prestasi = Prestasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 1)->get();
        $zonasi = Zonasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 1)->get();

        $siswa = Siswa::with('kampung')->get();
        // $sekolah = Sekolah::sekolah()->first();
        // $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        // $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        // $prestasi = Prestasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get();
        // $zonasi = Zonasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get();

        $siswa = Siswa::get();
        return view('laporan.siswa_lulus', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi', 'zonasi', 'now'));
    }

    public function cetakPdfSiswaDitolak()
    {
        $now = now()->format('Y');
        $sekolah = Sekolah::sekolah()->first();
        // dd($sekolah);
        $afirmasi = Afirmasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 2)->get();
        // dd($afirmasi);
        $pindahTugas = PindahTugas::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 2)->get();
        $prestasi = Prestasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 2)->get();
        $zonasi = Zonasi::where('sekolah_id', $sekolah->id)->whereYear('created_at', $now)->where('status', 2)->get();

        $siswa = Siswa::with('kampung')->get();
        return view('laporan.siswa_ditolak', compact('afirmasi', 'sekolah', 'siswa', 'pindahTugas', 'prestasi', 'zonasi', 'now'));
    }

    public function exportExcelSiswaLulus()
    {
        // return Excel::download(new SiswaLulusExport, 'siswaLulus-' . Carbon::now()->timestamp . ' .xlsx' ?? '');
        return (new SiswaLulusExport)->download('siswaLulus.xlsx');
    }

    public function exportExcelAfirmasiSiswaLulus()
    {
        return (new SiswaLulusJalurAfirmasi)->download('siswaLulusJalurAfirmasi.xlsx');
    }

    public function exportExcelAfirmasiSiswaBelumLulus()
    {
        return (new SiswaBelumLulusJalurAfirmasi)->download('siswaBelumLulusJalurAfirmasi.xlsx');
    }

    public function exportExcelPindahTugasSiswaLulus()
    {
        return (new SiswaLulusJalurPindahTugas)->download('siswaLulusJalurPindahTugasOrangTua.xlsx');
    }

    public function exportExcelPindahTugasSiswaBelumLulus()
    {
        return (new SiswaBelumLulusJalurPindahTugas)->download('siswaBelumLulusJalurPindahTugasOrangTua.xlsx');
    }

    public function exportExcelPrestasiSiswaLulus()
    {
        return (new SiswaLulusJalurPrestasi)->download('siswaLulusJalurPrestasi.xlsx');
    }

    public function exportExcelPrestasiSiswaBelumLulus()
    {
        return (new SiswaBelumLulusJalurPrestasi)->download('siswaBelumLulusJalurPrestasi.xlsx');
    }

    public function exportExcelZonasiSiswaLulus()
    {
        return (new SiswaLulusJalurZonasi)->download('siswaLulusJalurZonasi.xlsx');
    }

    public function exportExcelZonasiSiswaBelumLulus()
    {
        return (new SiswaBelumLulusJalurZonasi)->download('siswaBelumLulusJalurZonasi.xlsx');
    }
}
