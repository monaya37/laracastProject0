<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(){
    //with() fn is to solve the n+1 problem
    
        return view('posts', [
        'posts' => Post::latest()->Filter(request(['search' , 'category']))->get(),
        'categories' => Category::all(),
        //'currentCategory' =>  Category::firstwhere('slug' ,request('categroy'))
        ]);
    }

    public function show(Post $post) {
        //retrun the view 'post' andthe varible in the array -which is also a variable in the 'post' view- is assigned to be $post
        return view('post', ['post' => $post]);
    }

    protected function getPosts(){

       //latest() fn is sorting posts by latest i guess
       $posts = Post::latest();
       //get() fn is to return is as an array
       return $posts->get();
    }
}
