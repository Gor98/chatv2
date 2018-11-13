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
Route::post('/addOpenMessage', 'ChatController@addOpenChatMessage')->name('addOpenMessage');

Route::get('/privateChatRooms', 'ChatController@privateChatRooms')->middleware('auth')->name('privateChatRooms');
Route::get('/privateChat', 'ChatController@privateChat')->middleware('auth')->name('privateChat');
Route::post('/addPrivateMessage', 'ChatController@addOpenChatMessage')->middleware('auth')->name('addOpenMessage');


Route::post('/addChatRoom', 'ChatController@addChatRoom')->middleware('auth')->name('addChatRoom');
