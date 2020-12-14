<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('dashboard/login','Backend\LoginController@login');
Route::post('dashboard/checklogin','Backend\LoginController@checklogin');
Route::post('dashboard/logout','Backend\LoginController@logout');


Route::group(['namespace'=>'Backend','prefix'=>'dashboard'], function () {


    Route::resource('/', 'HomeController');

    Route::resource('/admin', 'AdminController');

    Route::resource('/cusine', 'CusineController');

    Route::resource('/section', 'SectionController');

    Route::resource('/addons', 'AddonsController');

    Route::resource('/category', 'CategoryController');

    Route::resource('/cook', 'CookController');

    Route::resource('/dish', 'DishController');

    Route::resource('/discount', 'DiscountController');

    Route::resource('/allergen', 'AllergenController');

    Route::resource('/order', 'OrderController');

    Route::resource('/customer', 'CustomerController');


});




