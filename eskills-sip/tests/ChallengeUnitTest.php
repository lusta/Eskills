<?php

use App\Challenge;
use App\SkillsGap;
use App\User;
use App\Validation;

class ChallengeUnitTest extends TestCase {

 	/** @test */
    public function it_tests_adding_challenge()
	{
		$validator = new Validation();
		$newChallenge = array('user_id' =>'2',
						   'skills_gap_id' =>'3',
						   'title'=>'meeting about php developers',
						   'about'=>'discusssing possible solution',
						   'challenge_date'=>date('Y/m/d H:i:s'),
						   'is_private'=>'1',
							);
		if ($validator->checkChallengeValidation($newChallenge)) {
		   	  // Create a new skillsGap
			$challenge = new Challenge();
			$challenge->user_id = $newChallenge['user_id'];
			$challenge->skills_gap_id = $newChallenge['skills_gap_id'];
			$challenge->title = $newChallenge['title'];
			$challenge->about = $newChallenge['about'];
			$challenge->challenge_date = $newChallenge['challenge_date'];
			$challenge->is_private = $newChallenge['is_private'];
	    // skills should  save
	    $this->assertTrue($challenge->save());	

	    } else {
	    	$this->assertFalse(true);
	    } 
	}
 	/** @test */
	public function it_tests_updating_challenge()
	{
	  // update skillsgap
		//$skill = SkillsGap::find($id);
		$challenge = Challenge::where('title', '=', 'meeting about php developers')->first();
		$challenge->user_id = '2';
		$challenge->skills_gap_id = '3';
		$challenge->title = "meeting about php developers";
		$challenge->about = "discusssing possible solution";
		$challenge->challenge_date = date('Y/m/d H:i:s');
		$challenge->is_private = '0';
	    // update skills-gap
	    $this->assertTrue($challenge->update());	 
	}
 	/** @test */
    public function it_tests_displaying_challenge()
	{
	  // displaySkillsgap
		$challenge = Challenge::where('title', '=', 'meeting about php developers')->get();
	}
 	/** @test */
	public function it_checks_if_user_is_saved_in_database()
	{
		// Make call to application...
		$this->seeInDatabase('challenges', ['title' => 'meeting about php developers']);
	}
 	/** @test */
	public function it_tests_deleting_chellenge()
	{
	  // deleting Skillsgap
		if (Challenge::where('is_private', '=', '0')->delete()) {
			$this->assertTrue(true);
		} else {
			$this->assertFalse(true);
		}
		 
	}
}
