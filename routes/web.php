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




Route::get('/question', 'QuestionController@index')->name('question');
Route::post('question', 'QuestionController@store');

Route::get('mobile/mobileMain', 'MobileController@index');

Route::post('/join', 'GameController@join');

