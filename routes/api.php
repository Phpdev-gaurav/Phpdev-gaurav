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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    
        return $request->user();
    
    });

Route::group(['namespace' => 'api'], function() {
  Route::post('register','LoginController@register');
  Route::post('login','LoginController@login');

  Route::get('/webhook','MessangerController@webhook');


 
});


Route::group(['namespace' => 'api','middleware'=>'auth:sanctum'],function () { 
  Route::get('logout', 'LoginController@logout');
  Route::post('add-contact','ContactController@store'); 
  Route::post('/send-message','WhatsappController@store');
});


