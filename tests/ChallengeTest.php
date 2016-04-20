<?php

use App\Challenge;
use App\ChallengeManager;
use Illuminate\Support\Collection;
use App\User;
use App\App;
use App\SkillsGap;

use Mockery as m;

class ChallengeTest extends TestCase 
{

    public function setUp()
    {
        $this->mock = m::mock('App\Challenge');
    }

    public function tearDown()
    {
        m::close(); 
    }

    public function testifexpiredchallengesiscalled()
    {
        $coll = new Illuminate\Support\Collection;
        //$coll->add();

        $this->mock
             ->shouldReceive('expiredChallenges')
             ->once()
             ->andReturn($coll);

            // $this->assertInstanceOf('\Illuminate\Support\Collection' , $this->mock);

            $challengeManager = new ChallengeManager($this->mock);
    }    

    public function testandreturnmethod()
    {

        $this->mock
             ->shouldReceive('newChallenges')
             ->once()
             ->andReturn('test');

             $this->mock->newChallenges();
    }
    public function testgetUserById()
    {
        $user = new User();
        $this->mock
             ->shouldReceive('getUserById')
             ->once()
             ->andReturn($user);

             $id = 1;
             $this->mock->getUserById($id);

    }
    public function testThatChallengeReturnsTheSkillsGapThatItBelongsTo()
    {

             $challenge = new Challenge();
             $skills = new SkillsGap();
             $skillsGapPassed = $challenge->setSkillsGap($skills);
             $skillsGapReturned = $challenge->getSkillsGap();

             $this->assertSame($skillsGapPassed , $skillsGapReturned);
             //$this->assertInstanceOf(SkillsGap::class, $skillsGapReturned);
               
    }
    public function testIfDisableSkillsGapMethodInChallengeCallDisableMethodInSkillsGap()
    {
             $skills = new SkillsGap(); 

             $this->mock
                 ->shouldReceive('disableSkillsGap')
                 ->with($skills)
                 ->once()
                 ->andReturn('disabled');

             $challengeTest = $this->mock->disableSkillsGap($skills);
    }

    public function testIfGetChallengesMethodReturnAllChallengesInTheDatabase()
    {
             $challenges = new Challenge();
             $this->mock
                 ->shouldReceive('getChallenges')
                 ->once()
                 ->andReturn($challenges);

            $challengesReturned = $this->mock->getChallenges();
            $this->assertInstanceOf(Challenge::class, $this->mock);
    }

} 