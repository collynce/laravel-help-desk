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
Route::get('/admin/', function () {
    return view('admin.index');
});
Route::resource('tickets', 'TicketsController');

Route::group(['middleware'=>'role:admin'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    return 'I am a client';
});
Route::group(['middleware'=>'role:client'], function (){
    Route::get('/client', 'HomeController@client')->name('home');

});
Auth::routes();
Route::resource('category', 'TicketsCategory');
