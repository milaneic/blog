<?php

use Illuminate\Database\Seeder;
use PhpParser\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CategoriesPostsSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
