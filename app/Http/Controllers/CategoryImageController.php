<?php

namespace App\Http\Controllers;

use App\Models\CategoryImage;
use App\Http\Requests\StoreCategoryImageRequest;
use App\Http\Requests\UpdateCategoryImageRequest;

class CategoryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoryImage::all();
        return view('category_image.index', compact('category'));
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
     * @param  \App\Http\Requests\StoreCategoryImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryImageRequest $request)
    {
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/',$nama_dokumen);

        }
        CategoryImage::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $nama_dokumen
        ]);

        return redirect()->back()->with('success', 'Kategori Gambar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryImage  $categoryImage
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryImage $categoryImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryImage  $categoryImage
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryImage $categoryImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryImageRequest  $request
     * @param  \App\Models\CategoryImage  $categoryImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryImageRequest $request, CategoryImage $categoryImage)
    {
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/',$nama_dokumen);

            $categoryImage->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $nama_dokumen
            ]);

            return redirect()->back()->with('success', 'Kategori Image berhasil diupdate');


        }

        $categoryImage->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Kategori Image berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryImage  $categoryImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryImage $categoryImage)
    {
        $categoryImage->delete();
        return redirect()->back()->with('success', 'Kategori Image berhasil dihapus');
    }
}
