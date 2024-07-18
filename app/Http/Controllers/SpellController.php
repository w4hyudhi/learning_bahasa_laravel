<?php

namespace App\Http\Controllers;

use App\Models\Spell;
use App\Http\Requests\StoreSpellRequest;
use App\Http\Requests\UpdateSpellRequest;

class SpellController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Spell::all();
        return view('spell.index', compact('materi'));

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
     * @param  \App\Http\Requests\StoreSpellRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpellRequest $request)
    {

        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/',$nama_dokumen);

        }
        Spell::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $nama_dokumen
        ]);
        return redirect()->route('spells.index')->with('success', 'Materi berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spell  $spell
     * @return \Illuminate\Http\Response
     */
    public function show(Spell $spell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spell  $spell
     * @return \Illuminate\Http\Response
     */
    public function edit(Spell $spell)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpellRequest  $request
     * @param  \App\Models\Spell  $spell
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpellRequest $request, Spell $spell)
    {

        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/',$nama_dokumen);

            $spell->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $nama_dokumen
            ]);
            return redirect()->route('spells.index')->with('success', 'Materi berhasil diubah');
        }

        $spell->update([
            'name' => $request->name,
            'description' => $request->description
        ]);


        return redirect()->route('spells.index')->with('success', 'Materi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spell  $spell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spell $spell)
    {
        $spell->delete();
        return redirect()->route('spells.index')->with('success', 'Materi berhasil dihapus');
    }
}
