<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use App\Http\Requests\StoreTpsRequest;
use App\Http\Requests\UpdateTpsRequest;
use App\Models\Desa;
use Illuminate\Http\Request;
use Mapper;

class TpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Desa $desa)
    {
        $tps = Tps::where('desa_id', $desa->id)->get();
        return view('tps.index', compact('tps', 'desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Desa $desa)
    {

        Mapper::map($desa->distrik->latitude,  $desa->distrik->longitude, ['draggable' => true,'eventDragEnd' =>"(document.getElementById('latitude').value=(event.latLng.lat())); (document.getElementById('longitude').value=(event.latLng.lng()))",'zoom' => 18, 'markers' => ['title' => 'TPS', 'animation' => 'DROP'], 'cluster' => false]);
        return view('tps.create', compact('desa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTpsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTpsRequest $request, Desa $desa)
    {
        $tps = new Tps();
        $tps->desa_id = $desa->id;
        $tps->distrik_id = $desa->distrik->id;
        $tps->fill($request->all());
        $tps->save();
        return redirect()->route('desa.tps.index', $desa->id)->with('success', 'TPS berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tps  $tps
     * @return \Illuminate\Http\Response
     */
    public function show(Tps $tps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tps  $tps
     * @return \Illuminate\Http\Response
     */
    public function edit(Tps $tp)
    {
        $tps = $tp;
        Mapper::map($tps->latitude,  $tps->longitude, ['draggable' => true,'eventDragEnd' =>"(document.getElementById('latitude').value=(event.latLng.lat())); (document.getElementById('longitude').value=(event.latLng.lng()))",'zoom' => 18, 'markers' => ['title' => 'TPS', 'animation' => 'DROP'], 'cluster' => false]);
        return view('tps.edit', compact('tps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTpsRequest  $request
     * @param  \App\Models\Tps  $tps
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTpsRequest $request, Tps $tp)
    {

        $tp->update($request->all());
        return redirect()->route('desa.tps.index', $tp->desa->id)->with('success', 'TPS berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tps  $tps
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tps $tp)
    {

        $tp->delete();
        return redirect()->back()->with('success', 'TPS berhasil dihapus');
    }

    public function hasil(Request $request, Tps $tps)
    {
        $tps->update($request->all());
        return redirect()->route('desa.tps.index', $tps->desa->id)->with('success', 'hasil berhasil diubah');
    }
}
