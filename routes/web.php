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




    $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);
});


//the {post} variable is passed into the $slug value
Route::get('posts/{post}', function ($slug) {

    $post = Post::findOrFail($slug);

    return view('post', [
        'post' => $post
    ]);
});
