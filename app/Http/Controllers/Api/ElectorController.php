<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreElectorRequest;
use App\Http\Requests\UpdateElectorRequest;
use App\Http\Resources\ElectorResource;
use App\Models\Elector;
use Illuminate\Http\Request;

class ElectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Elector::with(['distrik', 'desa', 'tps']);

        if($request->has('tps_id') && $request->tps_id !== null)
            $query->where('tps_id', $request->tps_id);
        if($request->has('desa_id') && $request->desa_id !== null)
            $query->where('desa_id', $request->desa_id);
        if($request->has('distrik_id') && $request->distrik_id !== null)
            $query->where('distrik_id', $request->distrik_id);

        if ($request->has('search') && $request->search !== null) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('nik', 'like', '%' . $search . '%');
            });
        }

        $electors = $query->latest()->paginate(25);

        return ElectorResource::collection($electors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreElectorRequest $request)
    {
        $elector = Elector::create($request->all());
        return new ElectorResource($elector);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Elector $elector)
    {
        return json_encode($elector);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateElectorRequest $request, Elector $elector)
    {

        $elector->update($request->all());
        return new ElectorResource($elector);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
