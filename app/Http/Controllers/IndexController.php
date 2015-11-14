<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		$user_id = -1;
		$is_active = 0;

		if(Auth::check())
		{
			$user_id = Auth::id();
			$user    = User::getUserInfo($user_id);
			$first_name = $user->first_name;
			$active  = $user->is_active;
			$is_active  = $user->is_active;

			if($active) {
				return redirect()->intended('/results');
			}
			else
			{
        		#return view('master.default', ['user_id' => $user_id]);
        		#return view('auth/login', ['user_id' => $user_id]);
				Auth::logout();
				return view('index/index', 
					['user_id' => $user_id,
					 'is_active' => $is_active
					]
				);
			}
		}
        
        return view('index/index', 
			['user_id' => $user_id,
			 'is_active' => $is_active
			]
		);
        //
    }

}
