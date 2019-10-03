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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login','API\UserAuthController@login');
Route::post('login/{social_account}','API\UserAuthController@socialLogin');
Route::post('new-profile','API\UserRegisterApiController@regiUser');


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user/me','API\UserController@userDetail');
    Route::post('user/update-me','API\UserController@updateProfile');
    Route::post('user/update-password','API\UserController@updatePass');
});

Route::get('search','API\WebAPIController@search');
Route::get('cities','API\WebAPIController@cities');
Route::get('categories','API\WebAPIController@categories');
Route::get('popular','API\WebAPIController@getPopular');
Route::get('latest','API\WebAPIController@getLatest');
Route::get('featured','API\WebAPIController@getFeatured');
Route::get('coupons','API\WebAPIController@coupons');
Route::get('single-post','API\WebAPIController@singlePost');
