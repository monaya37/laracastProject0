<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//notice how the model name is the singular version of the table(migration) name;
class Post extends Model
{
    use HasFactory;


    public function categroy(){

        return $this->belongsTo(category::class);
    }
    
    //these two below are only used to deal with mass assignments stuff
    // $fillable = ['title'];
    // protected $guarded = ['*'];
}
