<?php namespace App;
use App\Challenge;
use App\SkillsGap;
use Illuminate\Support\Collection as Collection;

use Illuminate\Database\Eloquent\Model;

class ChallengeManager extends Model {

	//
	public function __construct(Challenge $challenge)
	{
		//$challengeCollection = $challenge->expiredChallenges(); 
		//$challenge->expiredChallenges();
		// $collection = collect(['test', 'test', null])->map(function($name)
		// {
		//     return strtoupper($name);
		// })
		// ->reject(function($name)
		// {
		//     return empty($name);
		// });
		$collectionExpChallenges = $challenge->expiredChallenges();

		if ($collectionExpChallenges instanceof Collection){

		} else {

			throw new \Exception("Error Processing Request");

		}
	}
}
/**
* second class
*/
class ChallengeSetter extends Model
{
	
	public function __construct(SkillsGap $skills)
	{
		$challenge = new Challenge();
		$skills->setSkillsGap($skills);
		$skills->getSkillsGap($challenge);
	}
}