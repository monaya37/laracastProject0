<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//notice how the model name is the singular version of the table(migration) name;
class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with =['category' , 'author'];
    
    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function author(){
        //the forgien key is not author_id its user_id so it must be passed otherwise laravel would assume it is author_id
        return $this->belongsTo(User::class, 'user_id');
    }


//i'm lost (;
//section 7 epi 1
    public function scopeFilter($query, array $filters){
        
         // the ?? is kinda equivilant to isset() fn
         //wth is query??
         $query->when($filters['search'] ?? false, function($query, $search){
            $query
            ->where('title', 'like', '%' . $search . '%')
            ->orwhere('body', 'like', '%' . $search . '%');
         });
         
         //get the posts where the categories equals what the user entered aka ===> $category
         $query->when($filters['category'] ?? false, function($query, $category){
            $query->whereHas('category' , fn($query)=>
                $query->where('slug', $category)
         );
         });
 
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    
}
