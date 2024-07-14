<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    use HasFactory;
    protected $fillable = [
       'name', 'description', 'image','category_image_id'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryImage::class, 'category_image_id');
    }

    public function getImageAttribute($value)
    {
        return config('app.url') .'/images/'. $value;
    }


}
