<?php

namespace App\Models;

use App\Traits\HasFormattedDateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Afirmasi extends Model
{
    use HasFactory;
    use HasFormattedDateTime;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sekolah_id',
        'siswa_id',
        'kk',
        'skl',
        'kip',
        'sktm',
        'status',
    ];


    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class);
    }

    /**
     * Get the siswa that owns the Prestasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }
}
