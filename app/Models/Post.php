<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

// OOP
class Post
{
    public static function find($slug){
        if(! file_exists($path= resource_path("samples/{$slug}.html"))){
            abort(500);
        }
    
        return cache()-> remember("samples.{$slug}",1200, fn()=>file_get_contents($path));
    }
}
