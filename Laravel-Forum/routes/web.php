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

Auth::routes();

Route::get('/forum', [
    'uses' => 'ForumsController@index',
    'as' => 'forum'
]);


Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::group(['middleware' => 'auth'], function(){

  Route::post('discussion/reply/{id}', [
        'uses' => 'DiscussionsController@reply',
        'as' => 'discussions.reply'
    ]);
   Route::get('discussion/create', [
        'uses' => 'DiscussionsController@create',
        'as' => 'discussions.create'
    ]);
    Route::post('discussion/store', [
        'uses' => 'DiscussionsController@store',
        'as' => 'discussions.store'
    ]);
    Route::get('discussion/edit/{slug}', [
        'uses' => 'DiscussionsController@edit',
        'as' => 'discussion.edit'
    ]);
    Route::post('discussion/update/{id}', [
        'uses' => 'DiscussionsController@update',
        'as' => 'discussion.update'
    ]);
    Route::get('reply/edit/{id}', [
        'uses' => 'RepliesController@edit',
        'as' => 'reply.edit'
    ]);
    Route::post('reply/update/{id}', [
        'uses' => 'RepliesController@update',
        'as' => 'reply.update'
    ]);
    Route::get('/reply/like/{id}',[
    'uses' => 'RepliesController@like',
    'as'  => 'reply.like'
]);
Route::get('/reply/unlike/{id}',[
    'uses' => 'RepliesController@unlike',
    'as'  => 'reply.unlike'
]);
Route::get('/discussion/watch/{id}',[
    'uses' => 'WatchersController@watch',
    'as'  => 'discussion.watch'
]);
Route::get('/discussion/unwatch/{id}',[
    'uses' => 'WatchersController@unwatch',
    'as'  => 'discussion.unwatch'
]);
Route::get('/discussion/best/reply/{id}',[
    'uses' => 'repliesController@best_answer',
    'as'  => 'discussion.best.answer'
]);

});
   
   Route::resource('channels','ChannelsController');
 
    Route::get('discussion/{slug}', [
        'uses' => 'DiscussionsController@show',
        'as' => 'discussions.show'
    ]);
  


Route::get('channel/{slug}', [
    'uses' => 'ForumsController@channel',
    'as' => 'channel'
]);

//});