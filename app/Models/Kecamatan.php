<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_kecamatan'];
    protected $table = 'kecamatans';

    public function nagari()
    {
        return $this->hasMany(Nagari::class);
    }
}
