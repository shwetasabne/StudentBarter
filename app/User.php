<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Log;
use DB;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

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
    protected $fillable = ['first_name', 'last_name','email', 'password', 'university_id', 'confirmation_code'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

	public static function getUserInfo($user_id)
	{
        Log::info(__CLASS__."::".__METHOD__."::"."Attempting to get the User information from database");

        if($user_id)
        {
			$user = DB::table('users')
					->join('university', 'users.university_id', '=', 'university.id')
					->select('users.first_name', 'users.last_name', 'users.created_at', 'university.name', 'university.id','users.is_active')
					->where('users.id', $user_id)
					->first();
        }

		return $user;
	}

    /**
     * Function to check whether user is active or not
     * params: email_id
     * return 0,1,fail;
     */

    public static function getActiveUser($email_id)
    {
        Log::info(__CLASS__."::".__METHOD__."::"."Attempting to get user information from database using email_id");

        $active = DB::table('users')
                    ->select('is_active')
                    ->where('email', $email_id)
                    ->first();
        
        return $active;
    }
}
