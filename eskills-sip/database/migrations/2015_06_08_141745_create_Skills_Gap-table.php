<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsGapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('skills_gaps', function (Blueprint $table)
            {
                $table->increments('id');
                $table->string('problem_name');
                $table->string('problem_description')->nullable();
                $table->integer('user_id')->nullable();
                $table->string('username')->nullable();
                $table->string('email')->nullable();
                $table->string('status')->nullable();
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
		Schema::drop('skills_gaps');
	}

}
