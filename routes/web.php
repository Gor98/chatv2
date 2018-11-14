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

Route::middleware(['auth'])->group(function () {
    Route::get('/privateChatRooms', 'ChatController@privateChatRooms')->name('privateChatRooms');
    Route::get('/privateChat/{id}', 'ChatController@privateChat')->name('privateChat');
    Route::post('/addPrivateMessage', 'ChatController@addPrivateChatMessage')->name('addPrivateChatMessage');


    Route::post('/addChatRoom', 'RoomController@addChatRoom')->name('addChatRoom');
    Route::post('/connectRoom', 'RoomController@ConnectToRoom')->name('ConnectToRoom');
    Route::get('/getRooms', 'RoomController@getRooms')->name('getRooms');
    Route::get('/room/messages/{id}', 'RoomController@getMessages')->name('getMessages');
});

