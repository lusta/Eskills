<?php namespace App\Services;

use App\User;
use App\Role;
use \App\Permission;
use Validator;
use Illuminate\Database\Seeder;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

use Zizaco\Entrust\EntrustRole;

class Registrar extends Seeder implements RegistrarContract{

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255|min:4',
			'surname' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{

		$user = User::create([
			'name' => $data['name'],
			'surname' => $data['surname'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
		$member = User::find($user['id']);
		$role = Role::where('name','=','member')->first();
        $member->attachRole($role);
		return $user;

	}
}
