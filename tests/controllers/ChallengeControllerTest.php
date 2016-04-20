<?php

/**
*  testing ChallengeController
*/
class ChallengeControllerTest extends TestCase
{
	
	public function __construct()
	{
		$this->mock = Mockery::mock('App\Challenge');
	}
	public function tearDown()
	{
	    Mockery::close();
	}
	public function testIndex()
    {
      $this->mock
           ->shouldReceive('all')
           ->once()
           ->andReturn('allChallenges');

       App::instance('App\Challenge', $this->mock); 

       $response = $this->call('GET', 'challenges'); 

   }
   public function testStore()
   {
    Input::replace($input = ['user_id' =>'2',
							 'skills_gap_id' =>'3',
							 'title'=>'meeting about php developers',
							 'about'=>'discusssing possible solution',
							 'challenge_date'=>date('Y/m/d H:i:s'),
							 'is_private'=>'1',
    						 ]);
 
    $this->mock
         ->shouldReceive('create')
         ->once()
         ->with($input);
 
    $this->app->instance('Challenge', $this->mock);
 
    $response = $this->call('POST', 'createChallenge');
 
   // $this->assertRedirectedToRoute('challenges');
  }
} 