<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'koordinator',
        'no_hp',
    ];

    public function distrik()
    {
        return $this->belongsTo(Distrik::class);
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
