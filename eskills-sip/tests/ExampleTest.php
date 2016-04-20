<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
		//run the following command for tests
		//./vendor/bin/phpunit 
	}
	public function testGetUsers()
	{
		$response = $this->call('GET', '/admin/users');
		$this->assertEquals(200, $response->getStatusCode());
	}
	public function testBasicExample1()
    {
        $this->visit('/')
             ->see('Laravel 5');
    }

}
