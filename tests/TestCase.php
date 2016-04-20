<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	protected $baseUrl = 'http://localhost:8000';
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}
	// public function __call($method, $args)
 //    {
	//     if (in_array($method, ['get', 'post', 'put', 'patch', 'delete']))
	//      {
	//         return $this->call($method, $args[0]);
	//      }
 
 //      throw new BadMethodCallException;
 //  }

}
