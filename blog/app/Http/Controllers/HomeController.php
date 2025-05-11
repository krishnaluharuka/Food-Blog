<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $blogs=Blog::has('images')->published()->latest()->take(5)->get();
        $categories=Category::all();
        $main =$blogs->slice(0, 1);
        $first=$blogs->slice(1,2);
        $second=$blogs->slice(3,2);
        $top_dishes=$categories->where('name','Top Blog')->first();
        $top_blog=$top_dishes->blogs()->published()->get()->random();
        return view('home.index',compact('blogs','first','main','second','categories','top_dishes','top_blog'));
    }

    public function blog(){
        $blogs=Blog::all();
        $categories=Category::all();
        return view('home.blogs',compact('blogs','categories'));
    }

    public function category(Category $category){
        $blogss=$category->blogs()->get();
        $categoriess=Category::all();
        return view('home.cat_blogs',compact('blogss','categoriess'));
    }

    public function about(){
        $about=About::first();
        return view('home.about',compact('about'));
    }

    public function contact(){
        return view('home.contact');
    }

    public function singlepost(){
        return view('food_blog.single-post');
    }
}
