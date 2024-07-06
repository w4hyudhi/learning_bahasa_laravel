<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DashboardResource;
use App\Http\Resources\DistrikResource;
use App\Http\Resources\ListDistrikResource;
use App\Http\Resources\TotalResource;
use App\Models\Desa;
use App\Models\Distrik;
use App\Models\Elector;
use App\Models\Tps;
use Illuminate\Http\Request;

class DistrikController extends Controller
{
    function index()
    {
        $distriks = Distrik::with(['desa.tps'])->get();
        return DistrikResource::collection($distriks);
    }

    function distrik()
    {
        $distriks = Distrik::with(['desa.tps','tps'])
            ->withCount('electors')
            ->orderBy('electors_count', 'desc')
            ->get();

        return DashboardResource::collection($distriks);
    }

    function dashboard()
    {
       $electors = Elector::all();
       $desa = Desa::with(['distrik','tps'])->get();
       $distrik = Distrik::all();
       $tps = Tps::with(['desa.distrik','electors'])->get();



       return new TotalResource(
            [
                'elector' => $electors,
                'desa' => $desa,
                'distrik' => $distrik,
                'tps' => $tps,
            ]
       );
        //  return response()->json([
        //       'elector' => $electors->count(),
        //       'desa' => $desa->count(),
        //       'distrik' => $distrik,
        //       'tps' => $tps->count(),
        //  ]);



    }

}
