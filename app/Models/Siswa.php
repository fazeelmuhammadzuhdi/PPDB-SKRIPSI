<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

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

    public static function noPendaftaran()
    {
        $kode = DB::table('siswas')->count();
        $addNol = '';
        $waktu = now()->format('Y');
        $kode = str_replace($waktu, "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;

        if (strlen($kode) == 1) {
            $tgl = now()->format('j');
            if (strlen($tgl) == 1) {
                $addNol = "0" . now()->format('j') . now()->format('m') . "00";
            } elseif (strlen($tgl) == 2) {
                $addNol = now()->format('j') . now()->format('m') . "00";
            }
        } elseif (strlen($kode) == 2) {
            $addNol = now()->format('h') . now()->format('i') . "0";
        } elseif (strlen($kode) == 3) {
            $addNol = "00";
        } elseif (strlen($kode) == 4) {
            $addNol = "0";
        }
        $kodeBaru = $waktu . $addNol . $incrementKode;
        return $kodeBaru;
    }


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
    public function prestasis(): HasMany
    {
        return $this->hasMany(Prestasi::class);
    }

    public function pindahTugas(): HasMany
    {
        return $this->hasMany(PindahTugas::class, 'siswa_id', 'id');
    }

    public function afirmasis(): HasMany
    {
        return $this->hasMany(Afirmasi::class);
    }
    public function zonasis(): HasMany
    {
        return $this->hasMany(Zonasi::class);
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

    public function scopeSiswa($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }

    public function nagari()
    {
        return $this->belongsTo(Nagari::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kampung()
    {
        return $this->belongsTo(Kampung::class);
    }
}
