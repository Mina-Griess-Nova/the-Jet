<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Front\HomeController@index');

/*******************frontend routes**************************/

Route::group(['namespace'=>'Front'], function () {

    Route::resource('dishes', 'HomeController');
    // Route::group(['middleware' => ['customer']], function () {
    Route::resource('dish', 'DishController');
    Route::resource('cooker', 'CookerController');
    Route::resource('profile', 'CustomerFrontController');
    Route::resource('gift-card', 'GiftCardController');
    Route::resource('order', 'OrderController');
    Route::post('/filter', 'FilterController@filter')->name('filter');

    // });
});

Route::get('otbokhly/login', 'Front\LoginController@login')->name('otbokhly.login');
Route::post('otbokhly/login', 'Front\LoginController@checklogin');
Route::get('otbokhly/logout/{id}', 'Front\LoginController@logout');
Route::get('otbokhly/register', 'Front\LoginController@register');
Route::post('otbokhly/checkregister', 'Front\LoginController@checkregister');


Route::get('FAQS',function(){
    return view('front.faqs');
});
Route::get('Safety&Trust',function(){
    return view('front.safetyandtrust');
});


Route::resource('dish/order', 'Backend\OrderController');


