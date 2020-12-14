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

Route::get('/', function () {
    return view('welcome');
});

/*******************frontend routes**************************/

Route::group(['namespace'=>'Front'], function () {

    Route::resource('dishdivvy', 'HomeController');
    // Route::group(['middleware' => ['customer']], function () {
    Route::resource('dish', 'DishController');
    Route::resource('cooker', 'CookerController');
    Route::resource('customer', 'CustomerController');
    Route::resource('gift-card', 'GiftCardController');
    // });
});


Route::get('otbokhly/login', 'Front\LoginController@login');
Route::post('otbokhly/login', 'Front\LoginController@checklogin');
Route::get('otbokhly/logout/{id}', 'Front\LoginController@logout');
Route::get('otbokhly/register', 'Front\LoginController@register');
Route::post('otbokhly/register', 'Front\LoginController@checkregister');


Route::get('FAQS',function(){
    return view('front.faqs');
});
Route::get('Safety&Trust',function(){
    return view('front.safetyandtrust');
});


Route::resource('dish/order', 'Backend\OrderController');


