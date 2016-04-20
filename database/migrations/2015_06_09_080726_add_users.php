<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
				DB::table('users')->insert(array(
				array(
					'name' => 'lusta', 
					'surname' => 'myself', 
					'email' => 'myself@mail.com', 
					'location' => 'capetown', 
					'password' => Hash::make('password'), 
					'remember_token' => 'myself@mail.com', 
					'created_at' =>  date('Y-m-d H:i:s'),
					'updated_at' =>  date('Y-m-d H:i:s')
				),
				array(
					'name' => 'lusta12345', 
					'surname' => 'myself', 
					'email' => 'myself2@mail.com', 
					'location' => 'capetown', 
					'password' => Hash::make('password'), 
					'remember_token' => 'myself@mail.com', 
					'created_at' =>  date('Y-m-d H:i:s'),
					'updated_at' =>  date('Y-m-d H:i:s')
				),

			)
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
