<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Mail;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Models\University;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
   
    // Redirect to Master page on logout
    private $redirectAfterLogout = '/';
    // private $maxLoginAttempts = 10;

    private $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
			'university_id' => 'integer|required|min:2',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
		$confirmation_code = str_random(50);
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
			'university_id' => (int) $data['university_id'],
			'confirmation_code' => $confirmation_code,
        ]);

		$data['confirmation_code'] = $confirmation_code;
        Mail::send('email.welcome', $data, function($message) use ($user)
            {
                $message->from('studentbarter123@gmail.com', "Site name");
                $message->subject("Welcome to StudenBarter");
                $message->to($user->email);
            });

        return $user;
    }

	public function getRegister()
	{
		return view('auth/register', [
			"university_list" => University::all(),
		]);
	}

}
