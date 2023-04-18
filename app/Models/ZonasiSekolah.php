<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonasiSekolah extends Model
{
    use HasFactory;

    protected $table = 'zonasi_sekolahs';

    protected $fillable = [
        'nagari_id',
        'kampung_id',
        'kecamatan_id',
    ];

    public function nagari()
    {
        return $this->belongsTo(Nagari::class);
    }

    public function kampung()
    {
        return $this->belongsTo(Kampung::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
