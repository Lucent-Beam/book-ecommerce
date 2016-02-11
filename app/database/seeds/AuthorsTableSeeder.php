<?php

class AuthorsTableSeeder extends Seeder {


	public function run()
	{


	   DB::table('authors')->delete();

     Author::create([

       'name' => 'Luis',
       'surname' => 'Oliver'
     ]);

     Author::create([

       'name' => 'Taylor',
       'surname' => 'Meyer'
     ]);


}
	}
