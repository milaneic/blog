<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $captions=['Naslov1','Naslov2','Naslov3'];
    private $descriptions=['Opis1','Opis2','Opis3'];
    private $images=['right1.jpg','right2.jpg','right3.jpg'];

    public function run()
    {
        for($i = 0; $i < count($this->captions); $i++){
            \DB::table('posts')->insert([
                'caption' => $this->captions[$i],
                'description' => $this->descriptions[$i],
                'img' => $this->images[$i],
                'text' => 'Neki tekst'
            ]);
        }
    }
}
