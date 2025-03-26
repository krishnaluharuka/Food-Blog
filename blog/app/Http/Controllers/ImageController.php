<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $path='uploads';
        $images=Storage::disk('public')->directories($path);
        $blogs=Blog::all();
        return view('user.images.show',compact('blogs','images'))->with('meta_title','Image Folders');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $images = Image::latest()->get();
        $blogs=Blog::all();
        return view('user.images.create', compact('images','blogs'))->with('meta_title','Upload Image'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validate images
            'blog_id' => 'required|exists:blogs,id', // Blog ID is required
            'image_type' => 'required|in:cover,image1,image2,image3', // Validate image type
        ]);

        $blog=Blog::findorFail($request->blog_id);
        $blogname=Str::slug($blog->title)?:'untitled';
        // Loop through all images and save them
            $image=$request->image;
            $file_name=time().Str::slug($image->getClientOriginalName());

// Ensure the directory exists using File facade
            Storage::disk('public')->makeDirectory("uploads/$blogname");

            $filePath = $image->storeAs("uploads/$blogname",$file_name,'public');
            

            // Create a new image entry in the database
            Image::create([

                'blog_id' => $request->blog_id, // Store the associated blog ID
                'image_type' => $request->image_type, // Store the selected image type
                'file_name'=>$file_name,
                'file_path' => $filePath,
            ]);

            session()->flash('success','Image Uploaded Successfully');
            
            return redirect()->route('images.create');
    
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $path="uploads/$id";
        // $images=Storage::disk('public')->directories($path);
        $images=Storage::disk('public')->files($path);
        return view('user.images.showfiles',compact('images'))->with('meta_title',$id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $path=str_replace('_','/',$id);
        $image = Image::where('file_path',$path)->first();
        $blogs=Blog::all();
        return view('user.images.edit', compact('image','blogs'))->with('meta_title',$image->file_name)->with('meta_image',asset('storage/'.$image->file_path));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validate images
            'blog_id' => 'required|exists:blogs,id', // Blog ID is required
            'image_type' => 'required|in:cover,image1,image2,image3', // Validate image type
        ]);
    
        $image = Image::findOrFail($id);
    
        // Delete the old image from storage if it exists

        if (Storage::disk('public')->exists($image->file_path)) {
            Storage::disk('public')->delete($image->file_path);
        }
        $blog=Blog::findorFail($request->blog_id);
        $blogname=Str::slug($blog->title)?:'untitled';
        // Loop through all images and save them
            $image=$request->image;
            $file_name=time().Str::slug($image->getClientOriginalName());

// Ensure the directory exists using File facade
            Storage::disk('public')->makeDirectory("uploads/$blogname");

            $filePath = $image->storeAs("uploads/$blogname",$file_name,'public');
            
            $image=Image::findorFail($id);
            // Create a new image entry in the database

                $image->blog_id = $request->blog_id; // Store the associated blog ID
                $image->image_type = $request->image_type; // Store the selected image type
                $image->file_name= $file_name;
                $image->file_path = $filePath;
                $image->save();

            session()->flash('success','Image Data edited Successfully');
            
            return redirect()->route('images.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $path=str_replace('_','/',$id);
        
        $image = Image::where('file_path',$path)->first();
        if (Storage::disk('public')->exists($image->file_path)) {
            Storage::disk('public')->delete($image->file_path);
        }
        $image->delete();
        return redirect()->route('images.index')->with('success', 'Image deleted successfully');
    }


    // Delete image
    
    // Delete unused images
    public function DeleteUnusedImages()
    {

//     $unusedImages = Image::whereDoesntHave('blog')->get();

//     foreach ($unusedImages as $image) {
//     $imagePath = public_path('storage/' . $image->file_path);
//     if (file_exists($imagePath)) {
//         unlink($imagePath); // File delete from storage
//     }
//     $image->delete(); // Delete from database
// }

    }

    public function deleteFolder($id){
        $path=str_replace('_','/',$id);
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->deleteDirectory($path);
        }
        return redirect()->route('images.index')->with('success', 'Folder deleted successfully');
    }
}
