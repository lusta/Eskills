<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('challenges', function(Blueprint $table)
		{
                $table->increments('id');
                $table->integer('user_id')->nullable()
           								  ->unsigned();
                $table->integer('skills_gap_id')
						                   ->nullable()
						                   ->unsigned();
                $table->string('title')->nullable();
                $table->string('about')->nullable();
                $table->string('challenge_date')->nullable();
                $table->integer('challenge_type')->nullable();
                $table->string('link_url')->nullable();
                $table->smallinteger('is_private')
                    ->unsigned()
                    ->nullable();
                $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('challenges');
	}

}
