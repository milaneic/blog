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
            array('slug'=>'created_category','name'=>'Created category'),
            array('slug'=>'updated_category','name'=>'Updated category'),
            array('slug'=>'deleted_category','name'=>'Deleted category'),
            array('slug'=>'created_role','name'=>'Created role'),
            array('slug'=>'updated_role','name'=>'Updated role'),
            array('slug'=>'deleted_role','name'=>'Deleted role'),
            array('slug'=>'updated_user','name'=>'Updated user'),
            array('slug'=>'deleted_user','name'=>'Deleted user'),
            array('slug'=>'comment','name'=>'Commented post'),
            array('slug'=>'deleted_comment','name'=>'Deleted comment'),
        );

        foreach($Array as $a){
            DB::table('logs_types')->insert(['slug'=>$a['slug'],'name'=>$a['name']]);

        }

    }
}
