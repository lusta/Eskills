<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\Role;
use \App\Permission;
use \App\User;
use App\SkillsGap;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Model::unguard();

		// // $this->call('UserTableSeeder');
		// $user = new User();
  //       $user->name = 'mdumane';
  //       $user->surname = 'myself';
  //       $user->email = 'lungisamc@gmail.com';
  //       $user->location='cape town';
  //       $user->password = bcrypt('password');

  //       $user->save();

  //       $adminRole = DB::table('roles')->where('name', '=', 'admin')->pluck('id');
  //       $admin = User::where('email','=','lungisamc@gmail.com')->first();
  //       $admin->roles()->attach($adminRole);

		$skill = new SkillsGap();
		$skill->user_id = "31";
		$skill->problem_name = "php developers";
		$skill->problem_description = "lack of php developers";
		$skill->username = "mdumane";
		$skill->email = "lungisamc@gmail.com";
		$skill->status = "pending";

		$skill->save();


	}

}
