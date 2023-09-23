<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//notice how the model name is the singular version of the table(migration) name;
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'category_id'];
    
    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

  
    //these two below are only used to deal with mass assignments stuff
    // $fillable = ['title'];
    // protected $guarded = ['*'];
}
