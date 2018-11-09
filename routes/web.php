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
Route::get('/openChat', 'ChatController@openChat')->name('openChat');
Route::post('/addMessage', 'ChatController@addMessage')->name('addMessage');
Route::get('/privateChat', 'ChatController@privateChat')->name('privateChat');