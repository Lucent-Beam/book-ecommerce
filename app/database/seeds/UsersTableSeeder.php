<?php

class UsersTableSeeder extends Seeder {


	public function run()
	{
	   DB::table('users')->delete();

     User::create([
       'email' => 'member@email.com',
       'password' =>Hash::make('password'),
       'name' => 'Kethleens',
       'admin' => 0
     ]);

     User::create([
       'email' => 'admin@email.com',
       'password' =>Hash::make('adminpassword'),
       'name' => 'Joe',
       'admin' => 1
     ]);


	}

}
