<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $status=DB::table('roles')->first();
        if($status==NULL){
            DB::table('roles')->insert(array(
               array('roles' => "Admin User"), 
                array('roles' => "Sales User"),
                array('roles' => "Super Admin")
            ));
        }
      
    }
}
