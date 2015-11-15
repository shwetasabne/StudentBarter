<?php

namespace App\Library;

use App\User;
use Validator;
use Mail;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Product;
use DB;
use Session;


class MailHelper {

    public static function sendMail($subject, $message, $user_id, $productid)
    {
		$user       = User::where('id', $user_id)->first();
		$from_cc	= $user->email;		
		$owner      = Product::where('id', $productid)->first();
		$owner_info = User::where('id', $owner->user_id)->first();
		$sendto     = $owner_info->email;

		$data = array('bodytext' => $message);
		Mail::send('email.interest', $data, function($m) use ($user,$subject)
		{
			$m->from('studentbarter123@gmail.com', "$user->first_name $user->last_name");
			$m->subject("$subject");
			$m->to("shwetasabne@gmail.com")->cc("chinchoreyash@gmail.com");
		});
		return 1;
    }
}
