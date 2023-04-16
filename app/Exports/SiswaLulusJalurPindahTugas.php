<?php

namespace App\Exports;

use App\Models\PindahTugas;
use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaLulusJalurPindahTugas implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        $sekolah = Sekolah::sekolah()->first();
        return PindahTugas::query()->where('sekolah_id', $sekolah->id)->where('status', 1);
    }

    public function map($siswa): array
    {
        return [
            $siswa->siswa->nama_lengkap,
            $siswa->siswa->nisn,
            $siswa->siswa->jenis_kelamin == 'L' ? 'LAKI - LAKI' : 'PEREMPUAN',
            $siswa->siswa->alamat,
            $siswa->status == 2 ? 'BELLUM LULUS' : 'LULUS',
            $siswa->siswa->sekolah_asal
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
        ];
    }
}
