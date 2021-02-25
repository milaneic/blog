<?php

use App\Category;
use App\Post;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CategoriesPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $posts=Post::all();

       foreach($posts as $post){
        $rand1=rand(1,4);
        if($rand1==4)
        $rand2=3;
        else
        $rand2=$rand1+1;    
        DB::table('category_post')->insert([
            ['category_id'=>$rand1,'post_id'=>$post->id],
            ['category_id'=>$rand2,'post_id'=>$post->id],
        ]);
   }
}
}
