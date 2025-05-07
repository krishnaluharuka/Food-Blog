<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $about=About::all();
       $user_id=$about->user_id;
       $user=User::findorFail($user_id);
       if($user->role=='admin'){
    }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.about.create')->with('meta_title','About Website');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $about=new About();
        $request->validate([
            'title'=>'min:3|required',
            'image'=>'required|image',
            'contact'=>'required|numeric|digits:10',
            'email'=>'required|email',
            'fb_link'=>'nullable|url',
            'viber_link'=>'nullable|url',
            'whatsapp_link'=>'nullable|url',
            'insta_link'=>'nullable|url',
            'content'=>'required',
        ]);

        $about->title=$request->title;
        $about->content=strip_tags(str_replace('&nbsp;',' ',$request->content));
        $about->contact=$request->contact;
        $about->email=$request->email;
        $about->fb_link=$request->fb_link;
        $about->whatsapp_link=$request->whatsapp_link;
        $about->viber_link=$request->viber_link;
        $about->insta_link=$request->insta_link;
        $about->user_id=Auth::id();

        $image=$request->image;
        $file_name=$image->getClientOriginalName();
        $filePath = $image->storeAs("uploads",$file_name,'public');
        $about->logo=$filePath;
        $about->save();

        return redirect()->route('about.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
