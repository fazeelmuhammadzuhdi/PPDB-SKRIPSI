<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampung extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kampung',
        'nagari_id',
        'kecamatan_id',
    ];
    protected $table = 'kampungs';

    public function nagari()
    {
        return $this->belongsTo(Nagari::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    // public function zonasiSekolah()
    // {
    //     return $this->hasMany(ZonasiSekolah::class, 'kampung_id', 'id');
    // }
}
