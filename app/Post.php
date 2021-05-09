<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Category;
use App\Tag;
use App\User;


class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'image', 'content', 'category_id', 'user_id'];

    // Category relationship 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // User relationship 
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Tags relationship 
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    // check tag for post
   public function hasTag($tagId){
       $array = $this->tags->pluck('id')->toArray();
       return in_array($tagId , $array);
   }

}
