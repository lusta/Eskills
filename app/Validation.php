<?php namespace App;

use Validator;

class Validation
{
public function checkSkillsValidation($skills)
	{
		$rules = array(
			'problem_name' => 'required|max:255|min:4',
			'problem_description' => 'required|max:255|min:10',
			'email' => 'required|email|max:255',
			'username' => 'required|max:255|min:4',
			);
		$validator = Validator::make($skills, $rules);
		if ($validator->fails()) 
			{
			return false;
			} 
		else 
			{
				return true;
			}
	}
	public function checkChallengeValidation($challenge)
	{
		$rules = array(
			'user_id'=>'numeric',
			'skills_gap_id'=>'numeric',
			'title' => 'required|max:255|min:4',
			'about' => 'required|max:255|min:10',
			'challenge_date' => 'required|max:255',
			'is_private' => 'numeric',
			);
		$validator = Validator::make($challenge, $rules);
		if ($validator->fails()) 
			{
			return false;
			} 
		else 
			{
				return true;
			}
	}
}