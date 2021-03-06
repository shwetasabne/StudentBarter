<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
#    return view('welcome');
});
*/

Route::get('/', 'IndexController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Logout the user
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'Auth\RegistrationController@confirm'
]);

// Interested Email route...

Route::post('product/interestedmail', 'ProductController@interestedmail');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);

Route::resource('results', 'SearchResultsController');


Route::post('product/uploads', 'ProductController@uploads');
Route::post('product/removeuploads', 'ProductController@removeuploads');
Route::post('product/updatestate', 'ProductController@updatestate');
Route::resource('product', 'ProductController');

// User Profile routes...

Route::resource('profile', 'UserProfileController');

