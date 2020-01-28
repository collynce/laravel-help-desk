<?php

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
//Route::get('/admin', function () {
//    return view('admin.index');
//});
Route::get('/admin', function () {
    return view('admin.index');
});
Auth::routes();
Route::resource('tickets', 'TicketsController');
Route::get('/autoselect', 'TicketsController@assignTicket');

Route::group(['middleware'=>'role:admin'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    return 'I am a client';
});
Route::group(['middleware'=>'role:admin'], function (){
    Route::get('/client', 'HomeController@client')->name('home');

});
Route::resource('category', 'TicketsCategory');
Route::resource('alltickets', 'RoutesController');
Route::get('ticket/closed', 'TicketsController@closedTickets');
Route::resource('engineers', 'EngineersController');
Route::get('/engineer/all', 'EngineersController@getAllEngineers');
Route::get('/ticket', function () {
    return view('client.index');
});
Route::get('/engineer', function () {
    return view('admin.engineer.index');
});
Route::get('/admin', function () {
    return view('admin.index');
});

