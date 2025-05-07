<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable=[
        'title',
        'logo',
        'contact',
        'email',
        'fb_link',
        'whatsapp_link',
        'viber_Link',
        'insta_Link',
        'content',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
