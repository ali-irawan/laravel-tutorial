<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('/config', function(){
	
	return View::make('config');
});

Route::get('/routing', function(){

	return View::make('routing');
});

/**
 * GET 		/contributors 				index()   -> menampilkan daftar list
 * GET 		/contributors/create		create()  -> menampilkan halaman input untuk ADD
 * POST		/contributors		store()   -> simpan ke database (INSERT) 
 * GET		/contributors/{id}/edit		edit()	  -> menampilkan halaman input untuk EDIT (munculkan data lama)
 * PUT		/contributors/{id}/edit		update()  -> simpan ke database (UPDATE)
 * DELETE	/contributors/{id}			destroy() -> hapus data sesuai id	 
 */
Route::resource('/contributors', 'ContributorsController');

Route::get('/rest', function(){
	
	return View::make('rest');
});

Route::get('/angular', function(){

	return View::make('angular');
});
	