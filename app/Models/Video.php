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



            public function getYoutubeDescription()
            {
                $url = $this->url_video;
                $videoId = $this->extractVideoId($url);
                $apiUrl = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=" . $videoId . "&key=AIzaSyByfljkjHOpnnqsnGW_ONm9ZqBMngspLFc";
                $response = file_get_contents($apiUrl);
                $data = json_decode($response, true);
                $title = $data['items'][0]['snippet']['title'];

                return $videoId . "#" . $title;
            }

            private function extractVideoId($url)
            {
                $videoId = "";
                $pattern = '/(?:youtube(?:-nocookie)?\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
                preg_match($pattern, $url, $matches);
                if (isset($matches[1])) {
                    $videoId = $matches[1];
                }
                return $videoId;
            }



}
