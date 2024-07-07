<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_video_id','title', 'url_video'
     ];
        public function category()
        {
            return $this->belongsTo(CategoryVideo::class, 'category_video_id');
        }

        public function getYoutubeThumbnail()
        {
            $url = $this->url_video;
            $video_id = explode("?v=", $url);
            if (empty($video_id[1])) {
                $video_id = explode("be/", $url);
            }
            $video_id = $video_id[1];
            $thumbnail = "https://img.youtube.com/vi/".$video_id."/maxresdefault.jpg";
            return $thumbnail;
        }
}
