<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $dates = ['tanggal_lahir'];


    protected static function booted()
    {
        //memasukkan user id
        static::creating(function ($siswa) {
            $siswa->user_id = auth()->user()->id;
        });

        static::updating(function ($siswa) {
            $siswa->user_id = auth()->user()->id;
        });
    }

    public function getTempatTanggalLahirAttribute()
    {
        return $this->tempat_lahir . ", " . $this->tanggal_lahir->format('d F Y');
    }
}
