<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
                $table->increments('id');
                $table->string('event_title');
                $table->date('event_date');
                $table->string('location');
                $table->string('address')->nullable();
                $table->string('event_description')->nullable();
                $table->string('about')->nullable();
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
		Schema::drop('events');
	}

}
