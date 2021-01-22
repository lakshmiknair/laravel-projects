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

Route::get('todo', 'TodoController@index');
Route::get('todo/create', 'TodoController@create');
Route::get('todo/{todo}','TodoController@show');
Route::post('todo/store','TodoController@store');
Route::get('todo/edit/{todo}','TodoController@edit');
Route::get('todo/delete/{todo}','TodoController@delete');
Route::get('todo/complete/{todo}','TodoController@complete');
Route::post('todo/update/{todo}','TodoController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
