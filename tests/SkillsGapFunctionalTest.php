<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

//use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;

class SkillsGapFunctionalTest extends TestCase
{
    /** @test */
   public function it_tests_registration()
   {
       $this->visit('/home')
            ->seePageIs('auth/login')
            ->click('Register')
            ->seePageIs('auth/register')
            ->type('gift','name')
            ->type('surname','surname')
            ->type('mail555@test.com','email')
            ->type('password','password')
            ->type('password','password_confirmation')
            ->press('submit')
            ->seePageIs('/auth/register');
   }
  /** @test */
   public function it_tests_login()
   {
       $this->visit('/home')
            ->seePageIs('auth/login')
            ->type('lungisamc@gmail.com','email')
            ->type('password','password')
            ->press('submit')
            ->seePageIs('home');
   }
  
   public function it_tests_logout()
   {
    $user = new User(array('name' => 'mdumane'));
    $this->be($user);
      $this->visit('/home')
           ->seePageIs('/home')
           ->click('Logout')
           ->seePageIs('/');
   }
  
   public function it_tests_admin_add_user()
   {
    $user = new User(array('name' => 'mdumane'));
    $this->be($user);
    $url = '/admin/users/create';
       $this->visit($url)
            ->seePageIs($url)
            ->type('gift','name')
            ->type('surname','surname')
            ->type('mail89@test.com','email')
            ->type('mthatha','location')
            ->type('password','password')
            ->type('password','password_confirmation')
            ->press('submit')
            ->seePageIs('/admin/users');
   } 
}