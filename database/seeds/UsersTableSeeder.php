<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=200; $i++){
            if ($i==0){
                DB::table('users')->insert([
                    'name' => 'Admin',
                    'email' =>'admin@gmail.com',
                    'password' => bcrypt('12345678'),
                    'role'=>'admin',
                    'status'=>'active',
                    'email_verified_at'=>date('y-m-d'),
                    'contact'=> '01300023918',
                    'created_at'=> date('y-m-d'),
                    'updated_at'=> date('y-m-d'),
                ]);
            }
            else
            {
                DB::table('users')->insert([
                    'name' => 'user'.$i,
                    'email' =>'user'.$i.'@gmail.com',
                    'password' => bcrypt('12345678'),
                    'role'=>'user',
                    'status'=>'pending',
                    'email_verified_at'=>date('y-m-d'),
                    'contact'=> '01348'.$i,
                    'created_at'=> date('y-m-d'),
                    'updated_at'=> date('y-m-d'),
                ]);
            }

        }

    }
}
