<?php

namespace App\Http\Controllers;

use App\Models\Distrik;
use App\Http\Requests\StoreDistrikRequest;
use App\Http\Requests\UpdateDistrikRequest;

class DistrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distrik = Distrik::all();
        return view('distrik.index', compact('distrik'));
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
     * @param  \App\Http\Requests\StoreDistrikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistrikRequest $request)
    {
        Distrik::create($request->all());
        return redirect()->route('distrik.index')->with('success', 'Distrik berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distrik  $distrik
     * @return \Illuminate\Http\Response
     */
    public function show(Distrik $distrik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distrik  $distrik
     * @return \Illuminate\Http\Response
     */
    public function edit(Distrik $distrik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDistrikRequest  $request
     * @param  \App\Models\Distrik  $distrik
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDistrikRequest $request, Distrik $distrik)
    {
        $distrik->update($request->all());
        return redirect()->back()->with('success', 'Distrik berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distrik  $distrik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distrik $distrik)
    {
        //
    }
}
