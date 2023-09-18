<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    // YamlFrontMatter::parseFile($path);
    //the document has all data in "my-forth-post" including the metadata and the body
    // YamlFrontMatter::parseFile(
    //    $document =  resource_path('posts/my-forth-post.html')
    // );

    $files = File::files(resource_path("posts/"));
    $posts = [];

    foreach($files as $file){
        $document = YamlFrontMatter::parseFile($file);

        $posts[] = new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
    }



    // $posts = Post::all();

    return view('posts', [
        'posts'=> $posts
    ]);
});


//the {post} variable is passed into the $slug value
Route::get('posts/{post}', function ($slug) {

    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]);
  

})->where('post', '[A-z_\-]+');
