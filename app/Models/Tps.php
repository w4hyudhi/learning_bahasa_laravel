<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomer',
        'nama',
        'koordinator',
        'no_hp',
        'alamat',
        'desa_id',
        'distrik_id',
        'latitude',
        'longitude',
        'jumlah_dpt',
        'jumlah_dptb',
        'jumlah_dps',
        'suara',
        'suara_didapat',
        'suara_sah',
        'suara_tidak_sah',
        'suara_golput',

    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function distrik()
    {
        return $this->belongsTo(Distrik::class);
    }

    public function electors()
    {
        return $this->hasMany(Elector::class);
    }
}
