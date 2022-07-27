<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/msg', 'App\Http\Controllers\MsgController@index');
Route::get('/msg/new','App\Http\Controllers\MsgController@create');
Route::post('/msg','App\Http\Controllers\MsgController@store');
Route::get('/msg/{userId}', 'App\Http\Controllers\MsgController@conversation')->name('message.conversation');
Route::delete('/msg/{id}', 'App\Http\Controllers\MsgController@destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
