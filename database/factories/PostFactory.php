<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'caption'=>$faker->word,
        'description'=>$faker->sentence,
        'img'=>$faker->imageUrl,
        'text'=>$faker->text
    ];
});
