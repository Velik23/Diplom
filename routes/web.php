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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/crypt', 'MessageController@crypt')->name('crypt');
Route::post('/decrypt', 'MessageController@decrypt')->name('decrypt');

Route::post('/message/delete/{message}', 'MessageController@delete')->name('message.delete');