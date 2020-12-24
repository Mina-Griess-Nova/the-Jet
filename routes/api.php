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

Route::group(['middleware' => ['api','lang'], 'namespace' => 'API'], function () {
    Route::get('/dishes/{lang}/{location}','DishesNearYouController@getaddress');
    Route::get('/cities/{lang}', 'CityController@index');
    Route::get('/cook/{lang}/{id}', 'CookController@show');
    Route::get('/dish/{lang}/{id}', 'DishController@show');
    Route::get('/cooksnearyou/{lang}/{location}', 'CookNearYouController@getaddress');
    Route::post('/search/{lang}','DishController@search');
    Route::get('/filter/{lang}','FilterController@index');
    Route::post('/filter/{lang}','FilterController@show');
    Route::get('/vipcooks/{lang}','VIPCooksController@index');

});

Route::post('register', 'API\AuthController@register');
Route::post('login', 'API\AuthController@login');
Route::post('logout', 'API\AuthController@logout');
Route::post('refresh', 'API\AuthController@refresh');


Route::group(['middleware' => ['api','lang','auth:api'], 'namespace' => 'API'], function () {
    Route::get('/profile/{lang}/{id}','ProfileController@edit');
    Route::post('/profile/{lang}/{id}','ProfileController@update');
    Route::post('/addTocart/{lang}','CartController@store');
    Route::put('/editcart/{lang}/{id}','CartController@update');
    Route::get('/cart/{lang}','CartController@index');
    Route::post('/checkcoupon','ApplyCouponController@check');
    Route::post('/checkout','OrderController@store');


});
