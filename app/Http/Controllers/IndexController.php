		if (Auth::check()) {
			$user_id = Auth::id();
			$user    = User::getUserInfo($user_id);
			$first_name = $user->first_name;
			$active  = $user->is_active;
