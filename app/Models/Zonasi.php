<?php

namespace App\Models;

use App\Traits\HasFormattedDateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zonasi extends Model
{
    use HasFactory;
    use HasFormattedDateTime;
    protected $table = 'zonasis';

    protected $fillable = [
        'sekolah_id',
        'siswa_id',
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
