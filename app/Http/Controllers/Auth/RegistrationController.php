<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Product;
use DB;
use Session;


class RegistrationController extends Controller {

    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $users = User::where('confirmation_code', $confirmation_code)->get();
		$user = "";
		foreach ($users as $key) {
			$user = $key;
		}

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->is_active = 1;
        $user->confirmation_code = null;
        $user->save();
		
        Session::flash('status', "You have successfully verified your account.");
		return redirect()->intended('auth/login');
    }
}
