<?php

use App\Category;
use App\Comment;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Post;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker::create();
        $posts=Post::all();

        foreach($posts as $post){
            Comment::create(['user_id'=>rand(1,10),'post_id'=>$post->id,'text'=>$faker->text]);
            Comment::create(['user_id'=>rand(1,10),'post_id'=>$post->id,'text'=>$faker->text]);
        }
    }
}
