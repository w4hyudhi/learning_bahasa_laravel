<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpellResponse;
use App\Models\Spell;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function spell()
    {
        $spells = Spell::all();
        return SpellResponse::collection($spells);
    }
}
