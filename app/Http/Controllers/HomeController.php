<?php namespace App\Http\Controllers;


use \App\Role;
use \App\Permission;
use \App\User;
use Entrust;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usersList=User::all();
		if(Entrust::hasRole('member')) 
		{
		 return View('home');
		}
		else if(Entrust::hasRole('admin')) 
		{
		$usersList=User::all();
        return View('admin.dashboard.index',compact('usersList'));
		}
	// 	else
	// 	{
	// 	 return View('home');			
	// 	}
	 }

}
