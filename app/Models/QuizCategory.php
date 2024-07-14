<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'image', 'level'
    ];
    public function getImageAttribute($value)
    {
        return config('app.url') .'/images/'. $value;
    }
}
