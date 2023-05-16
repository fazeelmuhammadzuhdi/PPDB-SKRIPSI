<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nagari extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_nagari',
        'kecamatan_id'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kampung()
    {
        return $this->hasMany(Kampung::class);
    }

    // public function zonasiSekolah()
    // {
    //     return $this->hasMany(ZonasiSekolah::class, 'nagari_id', 'id');
    // }
}
