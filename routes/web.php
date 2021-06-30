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

Route::get('message', 'MessageController@getMessage');

Route::get('check', 'TestController@sendData');

Route::get('filter', 'TestController@filterURL');


Route::get('register','UserController@register')->name('register');
Route::get('login','UserController@login')->name('login');
Route::post('login','UserController@loginCheck')->name('login.check');
Route::get('logout','UserController@logout')->name('logout');
Route::resource('users','UserController');

Route::resource('products','ProductController')->middleware('admin');