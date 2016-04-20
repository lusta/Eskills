<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class sample extends Model  {


/**
* The database table used by the model.
*
* @var string
*/
protected $table = 'sample';

/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = ['id','username','details','image'];


public static function test()
{
    return "hello laravel";
}
public static function gettest()
{
    return self::test();
}

public static function getItem()
{
    return self::orderBy('username','asc')->get();
}

public static function findItem($id)
{
    return self::find($id);
}

}