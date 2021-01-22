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
Auth::routes();

Route::post('/subscribe',function(){
    $email = request('email');
    Newsletter::subscribe($email);
    Session::flash('success_message','subscribed successully');
    return redirect()->back();
});
Route::post('/results', function(){
    $posts = \App\Post::where('title','like','%' . request('query'). '%')->get();
    return view('results')->with('posts',$posts)
                          ->with('setting', \App\Setting::first())  
                          ->with('query', request('query'))  
                          ->with('categories',\App\Category::take(4)->get());

});

            Route::get('/dashboard', [
        'uses'=>'HomeController@index',
        'as' => 'home'
    ]);
    Route::get('/', [
        'uses'=>'FrontendController@index',
        'as' => 'index'
    ]);
    Route::get('/', [
        'uses'=>'FrontendController@index',
        'as' => 'index'
    ]);
    Route::get('post/{slug}', [
        'uses'=>'FrontendController@singlePost',
        'as' => 'post.single'
    ]);
    Route::get('category/{id}', [
        'uses'=>'FrontendController@category',
        'as' => 'category.single'
    ]);
    Route::get('tag/{id}', [
        'uses'=>'FrontendController@tag',
        'as' => 'tag.single'
    ]);

//showing many to many relationship
Route::get('/postsOfCategory', function(){
 return App\Tag::find(4)->posts;
});

//Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('/categories', 'CategoriesController');
//Route::resource('/post', 'PostsController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){


    Route::get('setting', [
        'uses' => 'SettingsController@index',
        'as'  => 'setting'
        ])->middleware('admin');

        Route::post('setting/update/{id}', [
            'uses' => 'SettingsController@update',
            'as'  => 'setting.update'
            ])->middleware('admin');   

             Route::get('/home', [
        'uses'=>'HomeController@index',
        'as' => 'home'
    ]);
    Route::get('profile', [
        'uses' => 'ProfilesController@index',
        'as'  => 'profile'
        ]);
        Route::post('profile/update', [
            'uses' => 'ProfilesController@update',
            'as'  => 'profile.update'
            ]);
    Route::get('user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as'  => 'user.delete'
        ]);
    Route::get('users', [
        'uses' => 'UsersController@index',
        'as'  => 'users'
        ]);
        Route::get('user/create', [
            'uses' => 'UsersController@create',
            'as'  => 'user.create'
            ]);
            Route::get('user/admin/{id}', [
                'uses' => 'UsersController@admin',
                'as'  => 'user.admin'
                ])->middleware('admin');
                Route::get('user/not_admin/{id}', [
                    'uses' => 'UsersController@not_admin',
                    'as'  => 'user.not_admin'
                    ]);
            Route::post('user/store', [
                'uses' => 'UsersController@store',
                'as'  => 'user.store'
                ]);
        Route::get('user/delete/{id}', [
            'uses' => 'UsersController@destroy',
            'as'  => 'user.delete'
            ]);
          
         Route::get('category/create', [
        'uses' => 'CategoriesController@create',
        'as'  => 'category.create'
        ]);
        Route::get('category/edit/{id}', [
            'uses' => 'CategoriesController@edit',
            'as'  => 'category.edit'
            ]);
            Route::get('category/delete/{id}', [
                'uses' => 'CategoriesController@destroy',
                'as'  => 'category.delete'
                ]);
        
        Route::post('category/store', [
            'uses' => 'CategoriesController@store',
            'as'  => 'category.store'
            ]);
            Route::post('category/update/{id}', [
                'uses' => 'CategoriesController@update',
                'as'  => 'category.update'
                ]);
                Route::get('categories', [
                    'uses' => 'CategoriesController@index',
                    'as'  => 'categories'
                    ]);
                      

    Route::get('post/create', [
        'uses' => 'PostsController@create',
        'as'  => 'post.create'
        ]);
                Route::post('post/update/{id}', [
                    'uses' => 'PostsController@update',
                    'as'  => 'post.update'
                    ]);
        
        Route::post('post/store', [
            'uses' => 'PostsController@store',
            'as'  => 'post.store'
            ]);
                Route::get('posts', [
                    'uses' => 'PostsController@index',
                    'as'  => 'posts'
                    ]);
                    Route::get('posts/trashed', [
                        'uses' => 'PostsController@trashed',
                        'as'  => 'posts.trashed'
                        ]);
                    Route::get('post/edit/{id}', [
                        'uses' => 'PostsController@edit',
                        'as'  => 'post.edit'
                        ]);
                        Route::get('post/delete/{id}', [
                            'uses' => 'PostsController@destroy',
                            'as'  => 'post.delete'
                            ]);
                            Route::get('post/kill/{id}', [
                                'uses' => 'PostsController@kill',
                                'as'  => 'post.kill'
                                ]);
                                Route::get('post/restore/{id}', [
                                    'uses' => 'PostsController@restore',
                                    'as'  => 'post.restore'
                                    ]);


                                    Route::get('tag/create', [
                                        'uses' => 'TagsController@create',
                                        'as'  => 'tag.create'
                                        ]);
                                        Route::get('tag/edit/{id}', [
                                            'uses' => 'TagsController@edit',
                                            'as'  => 'tag.edit'
                                            ]);
                                            Route::get('tag/delete/{id}', [
                                                'uses' => 'TagsController@destroy',
                                                'as'  => 'tag.delete'
                                                ]);
                                        
                                        Route::post('tag/store', [
                                            'uses' => 'TagsController@store',
                                            'as'  => 'tag.store'
                                            ]);
                                            Route::post('tag/update/{id}', [
                                                'uses' => 'TagsController@update',
                                                'as'  => 'tag.update'
                                                ]);
                                                Route::get('tags', [
                                                    'uses' => 'TagsController@index',
                                                    'as'  => 'tags'
                                                    ]);
                                                      
});
