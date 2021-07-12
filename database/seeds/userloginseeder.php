<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userloginseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status=DB::table('users')->first();
        if($status==NULL){
            DB::table('users')->insert([
                'name' => "Super Admin",
                'email' => "SuperAdmin@gmail.com",
                'password' => Hash::make('password'),
                'role_id' => 3

                ]);
        }
      
   
    }
}
