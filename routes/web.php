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


Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts', ['posts' => $category->posts, 'categories' => Category::all(), 'currentCategory' => $category] );
});

Route::get('authors/{author:username}', function (User $author) {

    return view('posts', ['posts' => $author->posts, 'categories' => Category::all()]);
});
