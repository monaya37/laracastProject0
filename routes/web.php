<?php


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

Route::get('/', function () {

    //with() fn is to solve the n+1 problem
    //latest() fn is sorting posts by latest i guess
    //get() fn is to return is as an array

    $posts = Post::latest();
    if(request('search')){
        $posts
            ->where('title', 'like', '%' . request('search') . '%')
            ->orwhere('body', 'like', '%' . request('search') . '%');
    }
    
    return view('posts', ['posts' => $posts->get() , 'categories' => Category::all()]);
});


//laravel is smart enough to match the post card (which is the id) with the post
Route::get('posts/{post:slug}', function (Post $post) {

    //retrun the view 'post' and the varible in the array -which is also a variable in the 'post' view- is assigned to be $post
    return view('post', ['post' => $post]);
});


Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts', ['posts' => $category->posts, 'categories' => Category::all(), 'currentCategory' => $category] );
});

Route::get('authors/{author:username}', function (User $author) {

    return view('posts', ['posts' => $author->posts, 'categories' => Category::all()]);
});
