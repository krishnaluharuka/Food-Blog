<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'file_path',
        'blog_id',
        'image_type', 
        'file_name',

    ];

    public function blog(){
        return $this->belongsTo('App\Models\Blog');
    }
}
