<?php namespace App;
use App\SkillsGap;

use Illuminate\Database\Eloquent\Model as Model;

class Challenge extends Model 
{

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 protected $table = 'challenges';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	 protected $fillable = ['user_id', 'skills_gap_id','title','about','challenge_date','is_private'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id'];

	protected $skillsGap = '';

	public function getChallengeSkillsGap()
	{
		$this->belongsTo('App\SkillsGap');
	}

	public function expiredChallenges()
	{
		return "testing";
	}
	public function getUserById($id){
		return User::findOrFail($id);
	}
	public function newChallenges()
	{
		return "string";
	}

	public function setSkillsGap(SkillsGap $skills)
    {
    	 return $this->skillsGap = $skills;
    }
	
	public function getSkillsGap()
    {
    	return $this->skillsGap;
    }
    public function disableSkillsGap(SkillsGap $skills)
    {
    	return $skills->disable();
    }
    public function getChallenges()
    {
    	$challenges = SkillsGap::all();
    }

}
