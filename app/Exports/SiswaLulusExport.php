<?php

namespace App\Exports;

use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\Afirmasi;
use App\Models\Prestasi;
use App\Models\PindahTugas;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class SiswaLulusExport implements FromQuery
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    // public function query()
    // {
    //     $sekolah = Sekolah::sekolah()->first();
    //     return new ([
    //         'siswa' => Siswa::get(),
    //         'afirmasi' => Afirmasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get(),
    //         'pindahTugas' => PindahTugas::where('sekolah_id', $sekolah->id)->where('status', 1)->get(),
    //         'prestasi' => Prestasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get(),
    //     ]);
    // }



    public function query()
    {
        return Siswa::query()->select('nama_lengkap', 'nisn', 'alamat', 'jenis_kelamin');
    }

    // public function view(): View
    // {
    //     $sekolah = Sekolah::sekolah()->first();

    //     return view('laporan.siswa_lulus', [
    //         'siswa' => Siswa::get(),
    //         'pindahTugas' => Afirmasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get(),
    //         'afirmasi' => PindahTugas::where('sekolah_id', $sekolah->id)->where('status', 1)->get(),
    //         'prestasi' => Prestasi::where('sekolah_id', $sekolah->id)->where('status', 1)->get(),
    //         'sekolah' => $sekolah
    //     ]);
    // }
}
