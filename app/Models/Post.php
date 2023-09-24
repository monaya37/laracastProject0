<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//notice how the model name is the singular version of the table(migration) name;
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'category_id'];
    protected $with =['category' , 'author'];
    
    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function author(){
        //the forgien key is not author_id its user_id so it must be passed otherwise laravel would assume it is author_id
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

  
    //these two below are only used to deal with mass assignments stuff
    // $fillable = ['title'];
    // protected $guarded = ['*'];
}
