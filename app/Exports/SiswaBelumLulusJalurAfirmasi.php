<?php

namespace App\Exports;

use App\Models\Afirmasi;
use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaBelumLulusJalurAfirmasi implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function query()
    {
        $sekolah = Sekolah::sekolah()->first();
        return Afirmasi::query()->where('sekolah_id', $sekolah->id)->where('status', 2);
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
            'Nama Siswa',
            'NISN',
            'Jenis Kelamin',
            'Alamat',
            'Status Pendaftaran',
            'Asal Sekolah',
        ];
    }
}
