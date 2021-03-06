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

    public function categories(){
        return $this->BelongsToMany(Category::class,'category_post');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
