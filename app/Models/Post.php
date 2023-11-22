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
    return cache()->rememberForever('posts.all', function () {
        return collect(File::files(resource_path("posts")))
        ->map(fn($file)=> YamlFrontMatter::parseFile($file))
        ->map( fn($doc) => new Post(
                $doc->title,
                $doc->excerpt,
                $doc->date,
                $doc->body(),
                $doc->slug,
            ))->sortByDesc('date');
    });
    
        
    }

    public static function find($slug) {
        
        $posts = static::alll()->firstWhere('slug', $slug);

        if (! $posts){
            throw new ModelNotFoundException();
        }
        return $posts;
    }

}
