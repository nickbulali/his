<?php

use Illuminate\Http\Request;

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

Route::post('/register', 'Auth\APIController@register');
Route::post('/login', 'Auth\APIController@login');
Route::get('/auth/signup/activate/{token}', 'Auth\APIController@signupActivate');

Route::middleware('auth:api')->group( function () {
	Route::post('/logout', 'Auth\APIController@logout');
    Route::get('/get-user', 'Auth\APIController@getUser');
    Route::get('/get-user-model', 'Auth\APIController@getUserModel');
});
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/