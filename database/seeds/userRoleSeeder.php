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
        
        $status=DB::table('Role')->first();
        if($status==NULL){
            DB::table('Role')->insert(array(
               array('Roles' => "Admin User"), 
                array('Roles' => "Sales User")
            ));
        }
      
    }
}
