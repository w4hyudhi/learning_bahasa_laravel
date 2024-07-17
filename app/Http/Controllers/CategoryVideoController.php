<?php

namespace App\Http\Controllers;

use App\Models\CategoryVideo;
use App\Http\Requests\StoreCategoryVideoRequest;
use App\Http\Requests\UpdateCategoryVideoRequest;

class CategoryVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoryVideo::all();
        return view('category_video.index', compact('category'));
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
     * @param  \App\Http\Requests\StoreCategoryVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryVideoRequest $request)
    {
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/',$nama_dokumen);

        }
        CategoryVideo::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $nama_dokumen
        ]);
        return redirect()->back()->with('success', 'Kategori Video berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryVideo  $categoryVideo
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryVideo $categoryVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryVideo  $categoryVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryVideo $categoryVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryVideoRequest  $request
     * @param  \App\Models\CategoryVideo  $categoryVideo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryVideoRequest $request, CategoryVideo $categoryVideo)
    {
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/',$nama_dokumen);

            $categoryVideo->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $nama_dokumen
            ]);

            return redirect()->back()->with('success', 'Kategori Video berhasil diupdate');


        }
        $categoryVideo->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Kategori Video berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryVideo  $categoryVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryVideo $categoryVideo)
    {
        $categoryVideo->delete();
        return redirect()->back()->with('success', 'Kategori Video berhasil dihapus');
    }
}
