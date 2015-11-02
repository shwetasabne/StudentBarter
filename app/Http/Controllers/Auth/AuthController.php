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
use Session;

use Illuminate\Http\Request;

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

    // Check whether user has verified his email, prior to sign in and display message if not.
    public function postLogin(Request $request){

        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        $email_id = $request->input('email');

        // Function call to fetch required data from DataBase
        $result = User::getActiveUser($email_id);

        if( is_null($result)){
            Session::flash('status', "C'mon Yo, Register first !");
        }else if ( $result->is_active == 0) {
            Session::flash('status', "Oops ! Looks like you have not verified yet.");
        }else{
                 
            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            $throttles = $this->isUsingThrottlesLoginsTrait();

            if ($throttles && $this->hasTooManyLoginAttempts($request)) {
                return $this->sendLockoutResponse($request);
            }

            $credentials = $this->getCredentials($request);

            if (Auth::attempt($credentials, $request->has('remember'))) {
                return $this->handleUserWasAuthenticated($request, $throttles);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            if ($throttles) {
                $this->incrementLoginAttempts($request);
            }

            return redirect($this->loginPath())
                ->withInput($request->only($this->loginUsername(), 'remember'))
                ->withErrors([
                    $this->loginUsername() => $this->getFailedLoginMessage(),
                ]);
        }
        
        return redirect()->intended('auth/login');
    }
}
