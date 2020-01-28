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
Route::get('/ticket/details/{id}', 'TicketsController@show');
Route::post('/tickets/comment', 'CommentsController@store');
Route::get('/engineers', 'EngineersController@index');
Route::post('/tickets/close/{id}', 'TicketsController@closeTicket');
Route::post('/tickets/open/{id}', 'TicketsController@reopenTicket');
Route::get('/alltickets', 'TicketsController@getAllTickets');
Route::get('/alltickets/open', 'TicketsController@getOpenTickets');
Route::get('/alltickets/closed', 'TicketsController@getClosedTickets');
Route::get('/alltickets/unassigned', 'TicketsController@unassignedTickets');
