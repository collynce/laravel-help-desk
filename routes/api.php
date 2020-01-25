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

Route::get('/tickets', 'TicketsController@index');
Route::post('/tickets', 'TicketsController@store');
Route::get('/tickets/category', 'TicketsController@create');
Route::post('/ticketcat', 'TicketsCategory@store');
