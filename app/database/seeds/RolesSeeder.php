<?php

class RolesSeeder extends Seeder {

	public function run()
	{
		DB::table("roles")->delete();
		
		Roles::create([ "id" => 1, "name" => "Developer" ]);
		Roles::create([ "id" => 2, "name" => "Analyst" ]);
		Roles::create([ "id" => 3, "name" => "Tester" ]);
	}

}