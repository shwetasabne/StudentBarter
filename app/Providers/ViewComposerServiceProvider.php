<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Models\University;
use App\User;
class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNav();
//        $this->composeUser(); 
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeNav()
    {
        view()->composer('master.template', function($view){
            $view ->with('university_list', University::all());
        });
    }

    private function composeUser()
    {
        $username = "TEMP";
        if(Auth::check())
        {
            $user_id 	= Auth::id();
            $user    	= User::getUserInfo($user_id);
            $username = $user->first_name;
        }
        var_dump($username);
        view()->composer('partials.nav', function($view) use($username){
            $view ->with('username', $username);

        });
    }
}
