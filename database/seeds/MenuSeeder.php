<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $names = ['Home', 'Post', 'Contact'];
    private $routes = ['home', 'post', 'contact'];

    public function run()
    {
        for($i = 0; $i < count($this->names); $i++) {
            \DB::table('menu')->insert([
                'name' => $this->names[$i],
                'route' => $this->routes[$i],
                'order' => $i
            ]);
        }
    }
}
