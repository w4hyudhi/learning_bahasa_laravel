<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Http\Requests\StoreDesaRequest;
use App\Http\Requests\UpdateDesaRequest;
use App\Models\Distrik;
use App\Models\Tps;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Distrik $distrik)
    {
        $desa = Desa::where('distrik_id', $distrik->id)->get();
        return view('desa.index', compact('desa', 'distrik'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDesaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDesaRequest $request, Distrik $distrik)
    {
        $desa = new Desa();
        $desa->distrik_id = $distrik->id;
        $desa->fill($request->all());
        $desa->save();
        return redirect()->route('distrik.desa.index', $distrik->id)->with('success', 'Desa berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDesaRequest  $request
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDesaRequest $request, Desa $desa)
    {
        $desa->fill($request->all());
        $desa->save();
        return redirect()->route('distrik.desa.index', $desa->distrik_id)->with('success', 'Desa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        $desa->delete();
        return redirect()->back()->with('success', 'Desa berhasil dihapus');
    }

    public function getDesaByDistrik($id)
    {
    $desas = Desa::where('distrik_id', $id)->pluck('nama', 'id');
    return response()->json($desas);
    }

    public function getTpsByDesa($id)
    {
    $tps = Tps::where('desa_id', $id)->pluck('nama', 'id');
    return response()->json($tps);
    }
}
