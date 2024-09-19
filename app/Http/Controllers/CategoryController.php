<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.category.index',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create',[
            'categories' => Category::all()
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category_name' => 'required'
        ]);

        Category::create($validateData);
        return redirect('/category')->with('pesan','data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('backend.category.edit',[
            'categories' => Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_name' => 'required'
        ]);

        Category::where('id',$id)->update($validateData);
        return redirect('/category')->with('pesan','data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Category::destroy($id);
        return redirect('/category')->with('pesan','data berhasil di hapus');
    }
}
