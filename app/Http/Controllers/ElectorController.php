<?php

namespace App\Http\Controllers;

use App\Models\Elector;
use App\Http\Requests\StoreElectorRequest;
use App\Http\Requests\UpdateElectorRequest;
use App\Models\Distrik;
use Yajra\DataTables\DataTables;

class ElectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Elector::with(['distrik', 'desa', 'tps']);

            return DataTables::of($query)
            ->addColumn('distrik_nama', function ($row) {
                return $row->distrik ? $row->distrik->nama : '';
            })
            ->addColumn('desa_nama', function ($row) {
                return $row->desa ? $row->desa->nama : '';
            })
            ->addColumn('tps_nama', function ($row) {
                return $row->tps ? $row->tps->nama : '';
            })
                ->addColumn('action', function ($row) {
                    $editRoute = route('elector.edit', $row->id);
                    $deleteRoute = route('elector.destroy', $row->id);
                    $csrfToken = csrf_token();

                    $button = <<<EOT
                        <a href="$editRoute" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="$deleteRoute" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="$csrfToken">
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    EOT;

                    return $button;
                })->rawColumns(['action'])
                ->make(true);
        }

        return view('elector.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distriks = Distrik::all();
        return view('elector.create', compact('distriks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreElectorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreElectorRequest $request)
    {
        $elector = new Elector();
        $elector->fill($request->all());
        $elector->save();
        return redirect()->route('elector.index')->with('success', 'Elector berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Elector  $elector
     * @return \Illuminate\Http\Response
     */
    public function show(Elector $elector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Elector  $elector
     * @return \Illuminate\Http\Response
     */
    public function edit(Elector $elector)
    {
        $distriks = Distrik::all();
        return view('elector.edit', compact('elector', 'distriks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateElectorRequest  $request
     * @param  \App\Models\Elector  $elector
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateElectorRequest $request, Elector $elector)
    {


        $elector->fill($request->all());
        $elector->save();
        return redirect()->route('elector.index')->with('success', 'Elector berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Elector  $elector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Elector $elector)
    {
        $elector->delete();
        return redirect()->route('elector.index')->with('success', 'Elector berhasil dihapus');
    }
}
