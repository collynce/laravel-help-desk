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

Auth::routes();
//Route::group(['middleware' => ['role:guest']], function () {
//    Route::get('/home', 'HomeController@index');
//});
//Route::group(['middleware' => ['role:admin']], function () {
//    Route::get('/admin', 'AdminController@admin');
//});
//Route::group(['middleware' => 'role:staff'], function () {
//    Route::get('/staff', 'AdminController@staff');
//});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('tickets', 'TicketsController');
    Route::get('/autoselect', 'TicketsController@assignTicket');
    Route::resource('category', 'TicketsCategory');
    Route::resource('alltickets', 'RoutesController');
    Route::get('ticket/closed', 'TicketsController@closedTickets');
    Route::resource('engineers', 'EngineersController');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
    Route::get('/engineer/all', 'EngineersController@getAllEngineers');
//    Route::get('/engineer/all', 'EngineersController@getAllEngineers');
    Route::get('/ticket', function () {
        return view('client.index');
    });
    Route::get('/engineer', function () {
        return view('admin.engineer.index');
    });
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::get('/allroles', function () {
        return view('admin.roles.index');
    });

    Route::group(['prefix' => 'api'], function () {
        Route::get('/tickets', 'TicketsController@index');
        Route::post('/tickets', 'TicketsController@store');
        Route::get('/tickets/category', 'TicketsController@create');
        Route::post('/ticketcat', 'TicketsCategory@store');
        Route::get('/ticket/details/{id}', 'TicketsController@show');
        Route::post('/tickets/comment', 'CommentsController@store');
        Route::post('/comments/users/{id}', 'CommentsController@users');
        Route::get('/engineers', 'EngineersController@index');
        Route::get('/engineers/details', 'EngineersController@getEngineers');
        Route::post('/tickets/close/{id}', 'TicketsController@closeTicket');
        Route::post('/tickets/open/{id}', 'TicketsController@reopenTicket');
        Route::get('/alltickets', 'TicketsController@getAllTickets');
        Route::get('/alltickets/open', 'TicketsController@getOpenTickets');
        Route::get('/alltickets/closed', 'TicketsController@getClosedTickets');
        Route::get('/alltickets/unassigned', 'TicketsController@unassignedTickets');
        Route::get('/roles/all', 'RolesController@index');
        Route::get('/permissions/all', 'PermissionsController@index');
        Route::post('/roles/add', 'RolesController@store');
        Route::post('/roles/add', 'RolesController@store');
        Route::post('/roles/assign', 'RolesController@update');
        Route::post('/roles/assignuser', 'RolesController@assignRoles');
        Route::get('/roles/allusers', 'RolesController@users');
        Route::post('/permissions/add', 'PermissionsController@store');
    });
});


//Route::group(['middleware'=>'role:client'], function (){
//    Route::get('/home', 'HomeController@index')->name('home');
//    return 'I am a client';
//});
//Route::group(['middleware'=>'role:staff'], function (){
//    Route::get('/home', 'HomeController@index')->name('home');
//    return 'I am a client';
//});
//Route::group(['middleware'=>'role:developer'], function (){
//    Route::get('/client', 'HomeController@client')->name('home');
//});
//Auth::routes();
//Route::get('/notify', function () {
//    $user = auth()->user();
//    dd($user->can('delete users'));
//});
//Route::get('/roles', 'PermissionsController@Permission');

