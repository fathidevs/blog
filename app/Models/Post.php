<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    // use HasFactory;
    
    public static function alll(){
        $path = resource_path("/posts");
        $files = File::files($path);
        
        return array_map(fn ($file) => $file->getContents(), $files);
    }

    public static function find($slug) {
        $path = resource_path("posts/{$slug}.html");

        if(!file_exists($path)){
            throw new ModelNotFoundException();
        }

        return cache()->remember("/post.{$slug}", 3, fn() => file_get_contents($path));
    }

}
