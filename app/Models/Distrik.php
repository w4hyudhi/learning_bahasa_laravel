<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrik extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'koordinator',
        'no_hp',
        'latitude',
        'longitude',
    ];

    public function desa()
    {
        return $this->hasMany(Desa::class);
    }

    public function tps()
    {
        return $this->hasMany(Tps::class);
    }

    public function electors()
    {
        return $this->hasMany(Elector::class);
    }
}
