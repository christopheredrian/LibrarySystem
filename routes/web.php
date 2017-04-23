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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'HomeController@index');
Route::get('/visitor', function () {
    return view('visitors.register');
});


Route::group(['middleware' => 'auth'], function () {
    Route::resource('admin/entries', 'Admin\\EntriesController');
    Route::resource('admin/users', 'Admin\\UsersController');
    Route::resource('admin/visitors', 'Admin\\VisitorsController');
});

Route::resource('admin/visitors', 'Admin\\VisitorsController', ['only' => [
    'store'
]]);
