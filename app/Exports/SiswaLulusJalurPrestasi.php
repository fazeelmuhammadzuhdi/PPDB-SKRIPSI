<?php

namespace App\Exports;

use App\Models\Prestasi;
use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaLulusJalurPrestasi implements FromQuery, WithMapping, WithHeadings
{
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
        return Prestasi::query()->where('sekolah_id', $sekolah->id)->where('status', 1)->orderBy('jumlah', 'desc');
    }

    public function map($siswa): array
    {
        return [
            $siswa->siswa->nama_lengkap,
            $siswa->siswa->nisn,
            $siswa->siswa->jenis_kelamin == 'L' ? 'LAKI - LAKI' : 'PEREMPUAN',
            $siswa->siswa->alamat,
            $siswa->status == 2 ? 'BELLUM LULUS' : 'LULUS',
            $siswa->siswa->sekolah_asal,
            $siswa->jumlah
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
            'RATA RATA NILAI RAPOR',
        ];
    }
}
