<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    //
    protected $fillable=[
        'caption','description','img','text','user_id'
    ];

    protected $casts=[
        'created_at'=>'datetime:d/m Y',
    ];

    public function categories(){
        return $this->BelongsToMany(Category::class,'category_post');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function getPosts($categories, $sortValue, $key){
        $post = Post::with('categories');
        if(is_array($categories)){
            $post = $post->whereHas('categories', function($query) use ($categories){
                return $query->whereIn('category_id', $categories);
            });
        }

        $post->where('caption', 'like', '%'.$key.'%');
        if($sortValue){
            $post->orderBy('caption', $sortValue);
        }

        return $post;
    }

}
