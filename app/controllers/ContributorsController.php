<?php

use Symfony\Component\Security\Core\Role\Role;
class ContributorsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contributors = Contributors::join('roles','roles.id','=','contributors.role_id')
		                  ->select( DB::raw(' contributors.*, roles.name as role_name ')  )
		                  ->orderBy('name')->get();
		
		return View::make("contributors.index")
		  ->with('contributor_list', $contributors)
		  ->with('message', 'Some message');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$role_db_list = Roles::orderBy('name')->get();
		
		$role_list = [];
		foreach($role_db_list as $key => $value){
			$role_list[  $value->id ] = $value->name;
		}
// 		$role_list = [
// 	        "1" => "Developer",
// 	        "2" => "Analyst",
// 	        "3" => "Tester"
		
// 		];
		return View::make("contributors.create")
		   ->with('role_list', $role_list);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		    // Validasi
			$rules = [
				"name" => "required",
				"email" => "required|email",
				"role_id" => "required"
			];
			
			$validator = Validator::make( Input::all(),  $rules);
			
			if($validator->fails()){
				return Redirect::to('/contributors/create')
				   ->withErrors($validator)
				   ->withInput(Input::all());
			}
		
		    // Simpan ke database
			try {
				// TODO insert ke database
				
				return Redirect::to('/contributors');
			}catch(Exception $ex){
				
				return Redirect::to('/contributors/create')
				   ->withErrors([  'errors' => [ $ex->getMessage() ] ])
				   ->withInput(Input::all());;
			}
		   
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role_db_list = Roles::orderBy('name')->get();
		
		$role_list = [];
		foreach($role_db_list as $key => $value){
			$role_list[  $value->id ] = $value->name;
		}

		$contributor = Contributors::find($id);
		
		return View::make("contributors.edit")
			->with('contributor', $contributor)
			->with('role_list', $role_list);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			// Validasi
			$rules = [
				"name" => "required",
				"email" => "required|email",
				"role_id" => "required"
			];
			
			$validator = Validator::make( Input::all(),  $rules);
			
			if($validator->fails()){
				return Redirect::to("/contributors/$id/edit")
				   ->withErrors($validator)
				   ->withInput(Input::all());
			}
		
		    // Simpan ke database
			try {
				// TODO insert ke database
				
				return Redirect::to('/contributors');
			}catch(Exception $ex){
				
				return Redirect::to("/contributors/$id/edit")
				   ->withErrors([  'errors' => [ $ex->getMessage() ] ])
				   ->withInput(Input::all());;
			}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$find = Contributors::find($id);
		$find->delete();
		
		return Redirect::to('/contributors');
	}


}
