<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /**
     * Get all of the prestasi for the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prestasi(): HasMany
    {
        return $this->hasMany(Prestasi::class);
    }

    /**
     * Get the user that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
