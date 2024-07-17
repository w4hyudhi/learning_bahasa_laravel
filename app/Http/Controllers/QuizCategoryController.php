<?php

namespace App\Http\Controllers;

use App\Models\QuizCategory;
use App\Http\Requests\StoreQuizCategoryRequest;
use App\Http\Requests\UpdateQuizCategoryRequest;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class QuizCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = QuizCategory::orderBy('level', 'asc')->get();
        return view('category_quiz.index', compact('category'));
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
     * @param  \App\Http\Requests\StoreQuizCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizCategoryRequest $request)
    {
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/',$nama_dokumen);

        }
        QuizCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'level' => $request->level,
            'image' => $nama_dokumen
        ]);

        return redirect()->back()->with('success', 'Kategori Quiz berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizCategory  $quizCategory
     * @return \Illuminate\Http\Response
     */
    public function show(QuizCategory $quizCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizCategory  $quizCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizCategory $quizCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuizCategoryRequest  $request
     * @param  \App\Models\QuizCategory  $quizCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuizCategoryRequest $request, QuizCategory $quizCategory)
    {
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/',$nama_dokumen);

            $quizCategory->update([
                'name' => $request->name,
                'description' => $request->description,
                'level' => $request->level,
                'image' => $nama_dokumen
            ]);

            return redirect()->back()->with('success', 'Kategori Quiz berhasil diubah');

        }

        $quizCategory->update([
            'name' => $request->name,
            'description' => $request->description,
            'level' => $request->level
        ]);


        return redirect()->back()->with('success', 'Kategori Quiz berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizCategory  $quizCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizCategory $quizCategory)
    {
        //
    }
}
