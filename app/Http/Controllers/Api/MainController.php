<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageCategoryResponse;
use App\Http\Resources\ItemImageResponse;
use App\Http\Resources\QuizResponse;
use App\Http\Resources\SpellResponse;
use App\Http\Resources\VideoResponse;
use App\Models\CategoryImage;
use App\Models\CategoryVideo;
use App\Models\ItemImage;
use App\Models\Quiz;
use App\Models\QuizCategory;
use App\Models\Spell;
use App\Models\Video;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function spell()
    {
        $spells = Spell::all();
        return SpellResponse::collection($spells);
    }

    public function ImageCategory()
    {
        $spells = CategoryImage::all();
        return ImageCategoryResponse::collection($spells);
    }

    public function ItemImage($id)
    {
        $image = ItemImage::where('category_image_id', $id)->get();
        return ItemImageResponse::collection($image);
    }

    public function VideoCategory()
    {
        $spells = CategoryVideo::all();
        return ImageCategoryResponse::collection($spells);
    }

    public function ItemVideo($id)
    {
        $image = Video::where('category_video_id', $id)->get();
        return VideoResponse::collection($image);
    }

    public function QuizCategory()
    {
        $spells = QuizCategory::all();
        return ImageCategoryResponse::collection($spells);
    }

    public function ItemQuiz($id)
    {
        $quiz = Quiz::where('quiz_category_id', $id)->get();
        return QuizResponse::collection($quiz);
    }
}
