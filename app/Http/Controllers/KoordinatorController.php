<?php

namespace App\Http\Controllers;

use App\Models\Koordinator;
use App\Http\Requests\StoreKoordinatorRequest;
use App\Http\Requests\UpdateKoordinatorRequest;

class KoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreKoordinatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKoordinatorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Koordinator  $koordinator
     * @return \Illuminate\Http\Response
     */
    public function show(Koordinator $koordinator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Koordinator  $koordinator
     * @return \Illuminate\Http\Response
     */
    public function edit(Koordinator $koordinator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKoordinatorRequest  $request
     * @param  \App\Models\Koordinator  $koordinator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKoordinatorRequest $request, Koordinator $koordinator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Koordinator  $koordinator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Koordinator $koordinator)
    {
        //
    }
}
