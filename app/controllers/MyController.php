<?php

class MyController extends BaseController {
	
	public function index(){
		
// 		$contributors = [
// 		   (object)[ "name" => "Agus", "email" => "agust@solusiteknologi.co.id" ],
// 		   (object)[ "name" => "Efendi", "email" => "efendi@solusiteknologi.co.id" ],
// 		   (object)[ "name" => "Ali", "email" => "ali.irawan@solusiteknologi.co.id" ]
// 		];

		$contributors = Contributors::join('roles','roles.id','=','contributors.role_id')
		                  ->select( DB::raw(' contributors.*, roles.name as role_name ')  )
		                  ->orderBy('name')->get();
		
		return View::make("controller")
		  ->with('contributor_list', $contributors)
		  ->with('message', 'Some message');
	}
}