<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index()
    {
        $blogs=Blog::all();
        return view('user.blogs.show', compact('blogs'))->with('meta_title','BLOGS');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); 

        if($categories->count() == 0){
            session()->flash('info','To create a blog you must have category');
            
            return view('user.categories.create')->with('meta_title','Create CATEGORIES');;
        }

        return view('user.blogs.create', compact('categories'))->with('meta_title','Create BLOGS');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog=new Blog();
        $request->validate([
            'title'=>'required|min:3',
            'content'=>'required',
            'category_id' => 'required|array', // Ensure an array of category IDs is submitted
            'category_id.*' => 'exists:categories,id', 
        ]);


        $blog->title=$request->title;
        $blog->description=strip_tags(str_replace('&nbsp;',' ',$request->content));
        $blog->user_id=Auth::id();
        $blog->save();
        $blog->categories()->sync($request->category_id);
        return redirect()->route('blogs.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog=Blog::with('categories')->findorFail($id);
        $categories=Category::all();
        return view('user.blogs.edit',compact('blog','categories'))->with('meta_title',$blog->title)->with('meta_description',$blog->description);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog=Blog::findorFail($id);
        $request->validate([
            'title'=>'required|min:3',
            'content'=>'required',
            'category_id' => 'required|array', // Ensure an array of category IDs is submitted
            'category_id.*' => 'exists:categories,id', 
        ]);

        $blog->title=$request->title;
        $blog->description=strip_tags(str_replace('&nbsp;',' ',$request->content));
        $blog->user_id=Auth::id();
        $blog->save();
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog=Blog::findorFail($id);
        $blog->delete();
        return redirect()->route('blogs.index');
    }

    public function trashed(){
        $trashedBlogs = Blog::onlyTrashed()->get(); 
        return view('user.blogs.trash',compact('trashedBlogs'))->with('meta_title','TRASHED BLOGS');
    }

    public function restore($id)
{
    $blog = Blog::withTrashed()->findOrFail($id); // Retrieve even soft-deleted blogs

    // Restore the soft-deleted blog
    $blog->restore();

    return redirect()->route('blogs.trashed')->with('success', 'Blog restored successfully.');
}


    public function forceDelete($id)
{
    $blog = Blog::withTrashed()->findOrFail($id);
    $blog->forceDelete();
    return redirect()->route('blogs.trashed')->with('success', 'Blog permanently deleted.');
}
}
