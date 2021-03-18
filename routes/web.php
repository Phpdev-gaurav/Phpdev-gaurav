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

Route::get('/register','LoginController@register')->name('register');
Route::post('/add-user','LoginController@addUser')->name('add-user');

Route::get('/login','LoginController@showLogin')->name('login');
Route::post('/login','LoginController@login')->name('login');


Route::group(['middleware'=>'auth'],function () {
Route::get('/dashboard','DashboardController@index')->name('dashboard');
Route::get('/logout','DashboardController@logout')->name('logout');
Route::get('/contact','ContactController@index')->name('contact');
Route::get('/contact/create','ContactController@create')->name('contact.create');
Route::post('/contact/store','ContactController@store')->name('contact.store');

});
