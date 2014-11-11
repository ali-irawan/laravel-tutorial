<?php

class ContributorsSeeder extends Seeder {

	public function run()
	{
		DB::table("contributors")->delete();
		
		Contributors::create([ "name" => "Agus", "email" => "agust@solusiteknologi.co.id", "role_id" => 1 ]);
		Contributors::create([ "name" => "Efendi", "email" => "efendi@solusiteknologi.co.id", "role_id" => 1 ]);
		Contributors::create([ "name" => "Ali", "email" => "ali.irawan@solusiteknologi.co.id", "role_id" => 1 ]);
	}

}