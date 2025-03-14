<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function blogs(){
        return $this->belongsTo('App\Models\Blog');
    }
}
