<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    // use HasFactory;
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;
    
    public function __construct($title, $excerpt, $date, $body, $slug){

        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;

    }
    
    public static function alll(){
    
    return collect(File::files(resource_path("posts")))
    ->map(fn($file)=> YamlFrontMatter::parseFile($file))
    ->map( fn($doc) => new Post(
            $doc->title,
            $doc->excerpt,
            $doc->date,
            $doc->body(),
            $doc->slug,
        ));
        
    }

    public static function find($slug) {
        // $path = resource_path("posts/{$slug}.html");

        // if(!file_exists($path)){
        //     throw new ModelNotFoundException();
        // }

        // return cache()->remember("/post.{$slug}", 3, fn() => file_get_contents($path));
        $posts = static::alll();

        return $posts->firstWhere('slug', $slug);
    }

}
