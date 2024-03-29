<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adminSekolah()
    {
        return $this->belongsTo(User::class, 'sekolah_id')->withDefault([
            'name' => 'Belum ada operator sekolah',
        ]);
    }

    public function scopeSekolah($query)
    {
        return $query->where('sekolah_id', auth()->user()->id);
    }

    
}
