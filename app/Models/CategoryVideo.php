<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'image'
    ];
    public function getImageAttribute($value)
    {
        return config('app.url') .'/images/'. $value;
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
