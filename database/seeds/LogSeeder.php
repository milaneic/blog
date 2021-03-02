<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class   LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Array=array(
            array('slug'=>'register','name'=>'Registed'),
            array('slug'=>'login','name'=>'Logged'),
            array('slug'=>'logout','name'=>'Logged out'),
            array('slug'=>'create_post','name'=>'Created post'),
            array('slug'=>'updated_post','name'=>'Updated post'),
            array('slug'=>'deleted_post','name'=>'Deleted post'),
            array('slug'=>'comment','name'=>'Commented post'),
        );

        foreach($Array as $a){
            DB::table('logs_types')->insert(['slug'=>$a['slug'],'name'=>$a['name']]);

        }

    }
}
