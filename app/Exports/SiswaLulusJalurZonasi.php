<?php

namespace App\Exports;

use App\Models\Sekolah;
use App\Models\Zonasi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaLulusJalurZonasi implements FromQuery, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        $sekolah = Sekolah::sekolah()->first();
        return Zonasi::query()->where('sekolah_id', $sekolah->id)->where('status', 1)->orderBy('siswa_id', 'desc');
    }

    public function map($siswa): array
    {
        return [
            $siswa->siswa->nama_lengkap,
            $siswa->siswa->nisn,
            $siswa->siswa->jenis_kelamin == 'L' ? 'LAKI - LAKI' : 'PEREMPUAN',
            $siswa->siswa->kampung->nama_kampung,
            $siswa->status == 2 ? 'BELLUM LULUS' : 'LULUS',
            $siswa->siswa->sekolah_asal,
            $siswa->siswa->nagari->nama_nagari,
            $siswa->siswa->kecamatan->nama_kecamatan
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA SISWA',
            'NISN',
            'JENIS KELAMIN',
            'ALAMAT',
            'STATUS PENDAFTARAN',
            'ASAL SEKOLAH',
            'NAGARI',
            'KECAMATAN',
        ];
    }
}
