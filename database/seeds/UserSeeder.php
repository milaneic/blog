<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=0; $i <10 ; $i++) { 
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' =>$faker->email,
                'role_id'=>2,
                'password' => Hash::make('password'),
            ]);
        }
    }
}
