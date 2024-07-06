<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Elector extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nik',
        'kk',
        'nama',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'desa_id',
        'distrik_id',
        'tps_id',
        'telepon',
        'status_pemilih',
    ];

    protected $casts = [
        'nik' => 'string',
        'kk' => 'string',
     ];

    protected $dates = ['deleted_at'];

    public function desa()
    {
        return $this->belongsTo(Desa::class)->withDefault();
    }

    public function distrik()
{
    return $this->belongsTo(Distrik::class)->withDefault();
}

    public function tps()
    {
        return $this->belongsTo(Tps::class)->withDefault();
    }
}
