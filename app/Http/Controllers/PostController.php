<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(){
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
    }

    public function show(Post $post) {

        //retrun the view 'post' and the varible in the array -which is also a variable in the 'post' view- is assigned to be $post
        return view('post', ['post' => $post]);
    }
}
