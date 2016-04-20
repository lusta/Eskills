<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
	Route::get('/', 'WelcomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('admin/users','admin\AdminController@index');
	//socialite Authantication
	Route::get('login/{provider?}', 'Auth\AuthController@login');
 
	//user administration
	Route::get('admin/users/create', 'admin\AdminController@create');
	Route::post('admin/users/store', 'admin\AdminController@store');
	Route::get('admin/users/{id}/edit', 'admin\AdminController@edit');
	Route::post('admin/users/{id}/update', 'admin\AdminController@update');
	Route::get('admin/users/{id}/delete', 'admin\AdminController@show');
	Route::post('admin/users/{id}/destroy', 'admin\AdminController@destroy');
	//skills gap
	Route::get('/admin/skills', 'SkillsGapController@index');
	Route::get('admin/skills/{id}/delete', 'SkillsGapController@show');
	Route::post('admin/skills/{id}/destroy', 'SkillsGapController@destroy');
	Route::get('users/data', 'admin\AdminController@data');
	//skillsgap administration
	Route::get('/skills', 'SkillsGapController@skillGaps');
	Route::get('skills/create', 'SkillsGapController@create');
	Route::post('skills/store', 'SkillsGapController@store');
	Route::get('skills/{id}/edit', 'SkillsGapController@edit');
	Route::post('skills/{id}/update', 'SkillsGapController@update');

	//challenges
	Route::get('test', 'admin\AdminController@test');
	Route::get('createChallenges', 'ChallengeController@store');


	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]

	);

