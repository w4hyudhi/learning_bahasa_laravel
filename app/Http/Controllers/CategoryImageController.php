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
     * @param  \App\Http\Requests\StoreCategoryImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryImageRequest $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryImage  $categoryImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryImage $categoryImage)
    {
        //
    }
}
