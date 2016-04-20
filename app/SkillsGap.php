<?php namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class SkillsGap extends Model 
{
	protected $table = 'skills_gaps';

	protected $fillable = ['user_id', 'problem_name','problem_description','username','email','status'];
	public static $rules =  [
							'user_id'=>'required',
							'problem_name' => 'required|max:255|min:6',
							'problem_description' => 'required|max:255|min:6',
							'email' => 'required|email|max:255|unique:users',
							'username' => 'required|max:255|min:4',
							'status' => 'required|max:255|min:5',
							];

	public function user()
    {   		
        return $this->belongsTo('App\User');
    }
    
    public function comments()
    {
    	$this->has_many('Comment');
    }
    public function challenge()
    {
    	$this->has_many('Challenge');
    }
    public function getSkillsGap()
    {
    	
    }
}
