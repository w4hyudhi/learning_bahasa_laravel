<?php

namespace App\Http\Controllers;

use App\Models\ItemImage;
use App\Http\Requests\StoreItemImageRequest;
use App\Http\Requests\UpdateItemImageRequest;
use App\Models\CategoryImage;

class ItemImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryImage $categoryImage)
    {
        $categoryImage->load('images');
        return view('item_Image.index', compact('categoryImage'));
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
     * @param  \App\Http\Requests\StoreItemImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemImageRequest $request, CategoryImage $categoryImage)
    {

        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/',$nama_dokumen);

        }
        ItemImage::create([
            'category_image_id' => $categoryImage->id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $nama_dokumen
        ]);
        return redirect()->back()->with('success', 'Item berhasil ditambahkan');


        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemImage  $itemImage
     * @return \Illuminate\Http\Response
     */
    public function show(ItemImage $itemImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemImage  $itemImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemImage $itemImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemImageRequest  $request
     * @param  \App\Models\ItemImage  $itemImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemImageRequest $request, ItemImage $itemImage)
    {

        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/',$nama_dokumen);


            $itemImage->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $nama_dokumen
            ]);
            return redirect()->back()->with('success', 'Item berhasil diupdate');
        }

        $itemImage->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Item berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemImage  $itemImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemImage $itemImage)
    {
        $itemImage->delete();
        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }
}
