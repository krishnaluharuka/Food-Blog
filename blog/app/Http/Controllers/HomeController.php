<?php

namespace App\Http\Controllers;

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
        $top_dishes=$categories->where('name','Top Dishes')->first();
        $top_blog=$top_dishes->blogs()->published()->first();
        return view('home.index',compact('blogs','first','main','second','categories','top_dishes','top_blog'));
    }

    public function blog(){
        return view('home.blogs');
    }

    public function about(){
        return view('food_blog.about');
    }

    public function singlepost(){
        return view('food_blog.single-post');
    }
}
