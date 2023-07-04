<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'API', 'prefix' => '/auth'], function(){
    Route::get ('/',                                 'AuthController@auth')->name('api.auth.register');

    // ** Register new user ** //
    Route::post('/register',                         'AuthController@register')->name('api.auth.register');

    /* Restart password */
    Route::group(['prefix' => '/restart-password'], function(){
        Route::post('/generate-pin',                 'AuthController@generatePIN')->name('api.auth.restart-password.generate-pin');
        Route::post('/verify-pin',                   'AuthController@verifyPIN')->name('api.auth.restart-password.verify-pin');
        Route::post('/new-password',                 'AuthController@newPassword')->name('api.auth.restart-password.new-password');
    });
});

Route::group(['namespace' => 'API', 'prefix' => '/users', 'middleware' => 'auth:api'], function(){
    Route::post('/get-data',                        'UsersController@getUserData')->name('api.users.get-data');
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
