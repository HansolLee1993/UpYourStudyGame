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
//Show room create form
Route::get('/room', 'RoomController@create')->name('room');
Route::post('/room', 'RoomController@store');
Route::get('/game/{id}', 'GameController@index');

Route::get('/room', 'RoomController@index')->name('room');

Route::get('/waitingRoom', 'WaitingRoomController@index')->name('waitingRoom');

Route::get('/primary/answerSelection', 'WaitingRoomController@index')->name('/primary/answerSelection');

Route::get('/mobile/mobileMain', 'MobileController@index');
Route::post('/game/start/{id}', 'GameController@start');

Route::post('/join', 'GameController@join');
Route::middleware(['auth'])->group(function() {
    Route::get('/question', 'QuestionController@index')->name('question');
    Route::post('/question', 'QuestionController@store');
});
