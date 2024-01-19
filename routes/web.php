<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostController::class , 'index']);


//laravel is smart enough to match the post card (which is the id) with the post
Route::get('posts/{post:slug}', [PostController::class , 'show']);


//when you get the call of "categories/somthing" inovke the function
//مفهوم بس الكاتجوري من وين تجيني؟؟ 
//الجواب: تجيك من القوس الكيرلي
Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts', ['posts' => $category->posts, 'categories' => Category::all(), 'currentCategory' => $category] );
});

// the {} capture segments of the URI which in this case in the auther:username 
//and the $auther is assigend to auther:username
Route::get('authors/{author:username}', function (User $author) {

    return view('posts', ['posts' => $author->posts, 'categories' => Category::all()]);
});
