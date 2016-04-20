<?php

use App\SkillsGap;
use App\Validation;

class SkillsGapUnitTest extends TestCase 
{

 	/** @test */
    public function it_tests_adding_skillsgap()
	{ 
	    $validator = new Validation();
		$skillsgap = array('user_id' =>'31',
					   'problem_name'=>'php developers2',
					   'problem_description'=>'lack of php developers',
					   'username'=>'mdumane',
					   'email'=>'lungisamc@gmail.com',
					   'status'=>'pending' );
	    // skills should  save
	    if ($validator->checkSkillsValidation($skillsgap)) {
		   // Create a new skillsGap
			$skill = new SkillsGap();
			$skill->user_id = $skillsgap['user_id'];
			$skill->problem_name = $skillsgap['problem_name'];
			$skill->problem_description = $skillsgap['problem_description'];
			$skill->username = $skillsgap['username'];
			$skill->email = $skillsgap['email'];
			$skill->status = $skillsgap['status'];	
	    	$this->assertTrue($skill->save());
	    } else {
	    	$this->assertFalse(true);
	    }
	    
	    	 
	}
 	/** @test */
	public function it_tests_updating_skillsgap()
	{
	  // update skillsgap
		//$skill = SkillsGap::find($id);
		$skill = SkillsGap::where('problem_name', '=', 'php developers2')->first();
		$skill->user_id = "31";
		$skill->problem_name = "php developers";
		$skill->problem_description = "lack of php developers";
		$skill->username = "mdumane";
		$skill->email = "lungisamc@gmail.com";
		$skill->status = "solved";	 
	    // update skills-gap
	    $this->assertTrue($skill->update());	 
	}
 	/** @test */
    public function it_tests_displaying_skillsgap()
	{
	  // displaySkillsgap
		$skill = SkillsGap::where('problem_name', '=', 'php developers2')->get(); 
	}
 	/** @test */
	public function it_tests_deleting_skillsgap()
	{
	  // deleting Skillsgap
		if (SkillsGap::where('username', '=', 'mdumane')->delete()) {
			$this->assertTrue(true);
		} else {
			$this->assertTrue(false);
		} 
	}
}
