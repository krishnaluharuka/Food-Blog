<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Blog extends Model
{

    protected $fillable=[
        'title',
        'description',
        'user_id',
    ];
    use SoftDeletes;
    protected $dates=['deleted_at'];
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }

    public function images(){
        return $this->hasMany('App\Models\Image');
    }

//     public static function boot()
// {
//     parent::boot();

//     static::forceDeleted(function ($blog) {
//         $blogname=Str::slug($blog->title)?:'untitled';
//         $folderPath = "public/uploads/".$blogname;
//         if (Storage::exists($folderPath)) {
//             Storage::deleteDirectory($folderPath);
//         }
//     });
// }

}
