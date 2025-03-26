<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    public function blogs(){
        return $this->hasMany('App\Models\Blog');
    }

    use SoftDeletes;
    protected $dates=['deleted_at'];

}
