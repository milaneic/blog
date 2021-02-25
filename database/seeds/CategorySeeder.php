<?php

use App\Category;
use App\Comment;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Post;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namesCategory=['News','Celebrities','Food','Cars'];
        $faker=Faker::create();
        foreach($namesCategory as $cat){
            $cat=Category::create(
                [
                    'name'=>$cat,
                    'description'=>$faker->sentence(10,true)

                ]
                
            );

            for ($i=0; $i < 25; $i++) { 
                $post=Post::create([
                    'caption'=>$faker->word,
                    'description'=>$faker->text,
                    'text'=>$faker->text,
                    'img'=>$faker->imageUrl
                ]);
            }
        }
        //

        // DB::table('category_post')->insert([
        //     ['category_id'=>$cat->id,'post_id'=>$post->id],
        //     ['category_id'=>$cat->id+1,'post_id'=>$post->id],
        // ]);
    }
}
