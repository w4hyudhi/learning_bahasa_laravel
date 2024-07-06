<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Distrik;
use App\Models\Elector;
use App\Models\Tps;
use Mapper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tps = Tps::all();
        $totalDistrik = Distrik::count();
        $totalDesa = Desa::count();
        $totalTps = $tps->count();
        $totalPemilih = Elector::count();

        Mapper::map(-8.28929518984066, 140.53165124800452, ['draggable' => false,'zoom' => 12, 'cluster' => false, 'marker' => false,]);

        foreach ($tps as $data) {
            $content = '<h5>Informasi TPS</h5>
                    <p>Nomor TPS: ' . $data->nomer . '</p>
                    <p>Distrik: ' . $data->distrik->nama . '</p>
                    <p>Desa: ' . $data->desa->nama . '</p>
                    <p>Jumlah Pemilih Terdaftar: ' . $data->electors->count() . '</p>

                ';


            Mapper::informationWindow($data->latitude, $data->longitude, $content, ['open' => false, 'maxWidth'=> 200, 'autoClose' => true,

            ]);
        }


        return view('home', compact('totalDistrik', 'totalDesa', 'totalTps', 'totalPemilih'));
    }
}
