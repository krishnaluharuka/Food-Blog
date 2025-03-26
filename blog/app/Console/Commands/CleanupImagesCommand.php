<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CleanupImagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete blogs older than Two days and unused images from storage';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        //delete blogs older than 2 days
        $oldBlogs=Blog::where('created_at','<',Carbon::now()->subMinutes(10))->get();

        if($oldBlogs->isEmpty()){
            $this->info('No blogs older than 2 days found');
        }else{
            foreach($oldBlogs as $blog){
                foreach($blog->images as $image){
                    $filePath = 'public/uploads/' . $image->file_path; // Adjust path as necessary
                    if (Storage::exists($filePath)) {
                        Storage::delete($filePath);
                        $this->info("Deleted image: {$image->file_path}");
                    }

                    $image->delete();
                }

                $blogname=Str::slug($blog->title)?:'untitled';
                $folder_path="uploads/$blogname";

                if (Storage::disk('public')->exists($folder_path)) {
                    Storage::disk('public')->deleteDirectory($folder_path);
                }

                $blog->delete();
                $this->info("Deleted blog:{$blog->title}");
            }
        }

        //cleanUp unused Images
        $unusedImages=Image::doesntHave('blog')->get();
        if($unusedImages->isEmpty()){
            $this->info('No unused images found');
            return;
        }

        foreach ($unusedImages as $image) {
            // Delete image from storage
            $blog_id=$image->blog_id();
            $blog=Blog::findorFail($blog_id);
            $blogname=Str::slug($blog->title)?:'untitled';
            $folder_path="uploads/$blogname";

            $filePath = 'public/uploads/' . $image->file_path; // Adjust path as necessary
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
                $this->info("Deleted image: {$image->file_path}");
            }

            if (Storage::disk('public')->exists($folder_path)) {
                Storage::disk('public')->deleteDirectory($folder_path);
            }

            //delete data from database
            $image->delete();

        }

        $this->info('Cleanup complete.');
    }
}
