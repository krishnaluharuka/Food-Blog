<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            // return view('food_blog.categories-list');
            $categories=Category::all();
            return view('user.categories.index', compact('categories'))->with('meta_title','CATEGORIES');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.categories.create')->with('meta_title','Create Categories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category=new Category();
        $request->validate([
            'title'=>'required|min:3',
        ]);

        $category->name=$request->title;
        $category->save();
        return redirect()->route('create_category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::findorFail($id);
        return view('user.categories.edit',compact('category'))->with('meta_title','$category->name');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category=Category::findorFail($id);
        $request->validate([
            'title'=>'required|min:3',
        ]);

        $category->name=$request->title;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::findorFail($id);
        $category->delete();
        return redirect()->route('categories');
    }
}
