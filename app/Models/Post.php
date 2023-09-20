<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{

public $title;
public $excerpt;
public $date;
public $body;
public $slug;
    
public function __construct($title, $excerpt,$date, $body, $slug){
    $this->title = $title;
    $this->excerpt = $excerpt;
    $this->date = $date;
    $this->body = $body;
    $this->slug = $slug;
}


    public static function all()
    {
        //use the File facade, the "files()" method takes a directory
        //it returns a type of "symfony" aka some data about that directory
        //in this example it returns info about the files stored in posts directory (my-#th-post)
        // $files = File::files(resource_path("posts/"));


        //in the array_map funtion we are looping over y
        //each item is passed to x
        // array_map(funtion(x) {return x.stuff(); } ,y)
        //فاهمة كل شي يكون ليش يرجع شي "ستف" من الاكس للاكس يعني ليه ما يرجع شي من الواي للاكس؟
        // الجواب: هو لما يرجع ما يرجعها للاكس هو يكبظ عنصر من الواي ويعطيه للاكس بعدين ممكن اني ناخذ معلومات ذاك العنصر اللي هو اكس

        //loop over $files and getContents of each item and pass it to $file
        // return array_map(fn ($file) => $file->getContents(), $files);

        
   return cache()->rememberForever('post.all()', function(){
        return collect(File::files(resource_path("posts/")))
        ->map(function ($file) {
            //parse file litterly gets the content of the path
            return YamlFrontMatter::parseFile($file);
        })
        ->map(function ($document) {
            return new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            );
        })->sortByDesc('date');

    });
    }

    //understood 100%
    public static function find($slug)
    {
       $post = static::all()->firstWhere('slug' , $slug);
       return $post;
    }

    public static function findOrFail($slug)
    {
       $post = static::find($slug);

       if(!$post){
         throw new ModelNotFoundException();
       }

       return $post;
    }
}
