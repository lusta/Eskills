<?php 
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {

	 use Authenticatable, CanResetPassword;
	 use EntrustUserTrait; // add this trait to your user model

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'surname','email','location','password','provider_id','avatar'];
	
	public static $rules = [
							'name' => 'required|max:255|min:4',
							'surname' => 'required|max:255|min:4',
							'email' => 'required|email|max:255|unique:users',
							'location' => 'required|max:255|min:4',
							'password' => 'required|confirmed|min:6',
						   ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	public function Skills_Gap()
	{
		return $this->hasMany('App\Skills_Gap');
	}
	public function Challenge()
	{
		return $this->hasMany('App\Challenge');
	}
	public function Comments()
	{
		return $this->hasMany('App\Comment');
	}
	public function Solution()
	{
		return $this->hasMany('App\Solution');
	}
	public function events()
	{
		return $this->hasMany('App\Event');
	}
	public function industry()
	{
		return $this->hasMany('App\Industry');
	}

}
